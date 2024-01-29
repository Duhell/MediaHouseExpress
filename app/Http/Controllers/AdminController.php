<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Inbox;
use App\Models\Visit;
use Ramsey\Uuid\Uuid;
use App\Models\Member;
use App\Models\Article;
use App\Models\Episode;
use App\Models\Assistance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    //===================== ADMIN LOGIN ============================//
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $validatedCredentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($validatedCredentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'error' => 'Wrong email or password!'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    //===================== END ADMIN LOGIN ============================//


    //===================== DASHBOARD ==================================//

    public function dashboard()
    {
        date_default_timezone_set('Asia/Manila');

        //======= Visitors=======//
        $currentMonth = date('m');
        $lastMonth = date('m', strtotime('last month'));
        $totalVisits = Visit::count();
        $paginatedVisitors = Visit::orderBy('created_at', 'desc')->paginate(5);
        $currentMonthVisitors = Visit::whereMonth('created_at', $currentMonth)->count();
        $lastMonthVisitors = Visit::whereMonth('created_at', $lastMonth)->count();
        if ($lastMonthVisitors == 0) {
            $percentageIncrease = number_format($currentMonthVisitors > 0 ? 100 : 0, 1);
        } else {
            $percentageIncrease = number_format(($currentMonthVisitors - $lastMonthVisitors) / $lastMonthVisitors * 100, 1);
        }
        //======= End Visitors=======//

        //======= Inbox ==========//
        $today = date('d');
        $totalMessages = Inbox::count();
        $todayMessages = Inbox::whereDay('created_at', $today)->count();
        //======= End Inbox ==========//

        //======= Forms ===========//
        $totalForms = Assistance::count();
        $todayForms = Assistance::whereDay('created_at', $today)->count();
        //======= End Forms ========//


        return view('admin.dashboard', [
            'paginatedVisitors' => $paginatedVisitors,
            'visitors' => $totalVisits,
            'percent' => $percentageIncrease,
            'messages' => $totalMessages,
            'todayMessages' => $todayMessages,
            'assistance' => $totalForms,
            'todayAssistance' => $todayForms
        ]);
    }

    //===================== END DASHBOARD ==================================//



    //===================== INBOX ==================================//
    public function inbox(Request $request)
    {
        if ($request->ajax()) {
            if ($request->sort == "all") {
                return view('admin.tables.Messages', ['Messages' => Inbox::orderBy('created_at', 'desc')->get()]);
            }

            if ($request->sort == "read") {
                return view('admin.tables.Messages', ['Messages' => Inbox::where('isRead', 1)->orderBy('created_at', 'desc')->get()]);
            }

            if ($request->sort == "unread") {
                return view('admin.tables.Messages', ['Messages' => Inbox::where('isRead', 0)->orderBy('created_at', 'desc')->get()]);
            }

            if ($request->input) {
                $searchTerm = $request->input;
                $searchResults = Inbox::where('Name', 'like', '%' . $searchTerm . '%')->orderBy('created_at', 'desc')->get();
                return view('admin.tables.Messages', ['Messages' => $searchResults]);
            }


            if ($request->id) {
                $data = Inbox::where('id', $request->id)->first();
                if ($data->isRead == 0) {
                    $data->isRead = 1;
                    $data->save();
                }
                return view('admin.tables.TheMessage', compact('data'));
            }
        } else {
            return view('admin.inbox');
        }
    }

    public function mark_and_delete(Request $request)
    {
        if ($request->ajax()) {
            try {
                if ($request->mark_id) {
                    $message = Inbox::find($request->mark_id);
                    $message->isRead = !$request->mark_bool;
                    $message->save();
                    return response()->json('Done');
                }
                if ($request->delete_id) {
                    $message = Inbox::find($request->delete_id);
                    $message->delete();
                    return response()->json('Message Deleted');
                }
            } catch (Exception $error) {
                Log::error($error->getMessage(), [
                    'line' => $error->getLine(),
                    'file' => $error->getFile()
                ]);
            }
        }
    }

    //===================== END INBOX ==================================//



    //===================== FORMS ==================================//

    public function forms(?string $formID = null, ?string $delete = null)
    {
        if ($formID == null && $delete == null) {
            return view('admin.form', ['forms' => Assistance::orderBy('created_at', 'desc')->paginate(5)]);
        } else if ($formID != null && $delete == null) {
            $id = base64_decode($formID);
            return view('admin.form_details', ['data' => Assistance::find($id)]);
        } else {
            $id = base64_decode($formID);
            $form = Assistance::find($id);
            $form->delete();
            return redirect()->route('forms')->with(['success' => "Delete Success"]);
        }
    }

    public function searchForm(Request $request)
    {
        if ($request->value != "") {
            return view('admin.tables.Form', [
                'data' => Assistance::where('FirstName', 'like', '%' . $request->value . '%')
                    ->orWhere('MiddleName', 'like', '%' . $request->value . '%')
                    ->orWhere('LastName', 'like', '%' . $request->value . '%')
                    ->orderBy('created_at', 'desc')->get()
            ]);
        }
    }


    //===================== END FORMS ==================================//


    //===================== MEMBERSHIP ==================================//

    public function membership(?string $member_id = null, ?bool $delete = false)
    {
        if ($member_id == null) {
            return view('admin.membership')->with(['data' => Member::orderBy('created_at', 'desc')->paginate(5)]);
        }

        $data = Member::where('member_id', $member_id);

        if ($delete) {
            $data->delete();
            return redirect()->route('admin_membership')->with(['success' => "Delete Success"]);
        }

        return view('admin.membership_details')->with(['data' => $data->first()]);
    }

    public function search_membership(Request $request){
        if ($request->value != "") {
            return view('admin.tables.Membership', [
                'data' => Member::where('FullName', 'like', '%' . $request->value . '%')
                    ->orWhere('JobPosition', 'like', '%' . $request->value . '%')
                    ->orderBy('created_at', 'desc')->get()
            ]);
        }
    }





    //===================== END MEMBERSHIP ==================================//


    //===================== ARTICLES ==================================//

    public function article(?string $create = null, ?string $article_id = null)
    {
        if($create == "create" && $article_id === null){
            return view ('admin.add_articles');
        }else if($create == "edit" && $article_id != null){
            $article = Article::where('article_uuid',$article_id)->first();
            return view('admin.edit_article')->with('data',$article);
        }else if($create == "delete" && $article_id != null){
            $article = Article::where('article_uuid',$article_id)->first();
            $article->delete();
            return redirect()->route('admin_article')->with(['success' => "Article Deleted Successfully."]);
        }else{
            $articles = Article::orderBy('updated_at','desc')->paginate(10);
            return view('admin.article')->with('articles',$articles);
        }
    }

    public function add_article(ArticleRequest $request)
    {
        $validatedRequest = $request->validated();

        $article = new Article;
        $article->fill($validatedRequest);
        $article->article_uuid = Uuid::uuid4();
        $article->author_id = Auth::user()->id;
        $article->article_author = Auth::user()->name;

        if ($request->hasFile('article_img')) {
            $file = $request->file('article_img');
            $filename = $file->getClientOriginalName();

            // Create directory structure
            $directory = $article->article_author . '/';

            // Save the file to the directory
            $path = $file->storeAs($directory, $filename, 'public');

            // Save the path to the article
            $article->article_img = $path;
        }

        try{
            $article->save();
            return redirect()->route('admin_article')->with(['success' => "Article posted."]);
        }catch(Exception $error){
            Log::error($error->getMessage(), [
                    'line' => $error->getLine(),
                    'file' => $error->getFile()
                ]);
        }


    }

    public function update_article(ArticleRequest $request,string $uuid)
    {
        $validatedRequest = $request->validated();
        $update = Article::where('article_uuid',$uuid)->first();
        $update->fill($validatedRequest);

        if ($request->hasFile('article_img')) {
            // Delete the previous image
            Storage::disk('public')->delete($update->article_img);

            $file = $request->file('article_img');
            $filename = $file->getClientOriginalName();

            $directory = $update->article_author . '/';
            $path = $file->storeAs($directory, $filename, 'public');
            $update->article_img = $path;
        }

        try{
            $update->update();
            return redirect()->route('admin_article')->with(['success' => "Article Updated."]);
        }catch(Exception $error){
            Log::error($error->getMessage(), [
                    'line' => $error->getLine(),
                    'file' => $error->getFile()
                ]);
        }
    }

    //===================== END ARTICLES ==================================//




    //===================== EPISODES ==================================//

    public function episodes(string $delete = null, string $delete_id = null)
    {
        if ($delete === null && $delete_id === null) {
            $data = Episode::orderBy('created_at', 'desc')->get();
            return view('admin.episodes', compact('data'));
        }

        if ($delete == "delete" && $delete_id != "") {
            $id = base64_decode($delete_id);
            return $this->delete_episode($id);
        }
    }

    public function add_episode(Request $request)
    {
        $validateRequest = $request->validate([
            'title' => "required|max:255",
            'yt_url' => "required"
        ]);

        try {
            $new_episode = new Episode;
            $new_episode->fill($validateRequest);
            $new_episode->save();
            return back()->with(['success' => 'New episode added!']);
        } catch (Exception $error) {
            Log::error($error->getMessage(), [
                'line' => $error->getLine(),
                'file' => $error->getFile()
            ]);
        }
    }

    private function delete_episode(string $delete_id)
    {
        try {
            $episode = Episode::find($delete_id);
            if (!$episode) {
                return back()->withErrors(['error' => 'Failed to delete!']);
            }
            $episode->delete();
            return back()->with(['success' => 'Delete Success!']);
        } catch (Exception $error) {
            Log::error($error->getMessage(), [
                'line' => $error->getLine(),
                'file' => $error->getFile()
            ]);
        }
    }


    //===================== END EPISODES ==================================//


    //===================== ACCOUNT ==================================//

    public function account()
    {
        return view('admin.account');
    }

    public function updateAccount(Request $request, User $adminID)
    {
        $validatedData = $request->validate([
            'username' => 'max:255',
            'role' => '',
            'email' => 'email',
            'oldpass' => 'nullable|min:8',
            'password' => 'nullable|min:8',
        ]);

        if ($validatedData['password'] == null || $validatedData['oldpass'] == null) {
            $adminID->name = $validatedData['username'];
            $adminID->role = $validatedData['role'];
            $adminID->email = $validatedData['email'];
            $adminID->update();
        }

        if ($request->filled('oldpass')) {
            if (!Hash::check($request->input('oldpass'), $adminID->password)) {
                return back()->withErrors(['password' => 'The old password is incorrect.']);
            }
        }

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
            $adminID->update($validatedData);
        }

        return back()->with(['success' => "Update successfully!"]);
    }
    //===================== END ACCOUNT ==================================//


}
