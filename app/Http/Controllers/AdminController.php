<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Inbox;
use App\Models\Visit;
use App\Models\Assistance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    //===================== ADMIN LOGIN ============================//
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request){
        $validatedCredentials = $request->validate([
            'email' => 'required|email',
            'password'=>'required|min:8'
        ]);

        if(Auth::attempt($validatedCredentials)){
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'error'=> 'Wrong email or password!'
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
        $lastMonth = date('m',strtotime('last month'));
        $totalVisits = Visit::count();
        $paginatedVisitors = Visit::paginate(5);
        $currentMonthVisitors = Visit::whereMonth('created_at',$currentMonth)->count();
        $lastMonthVisitors = Visit::whereMonth('created_at',$lastMonth)->count();
        if ($lastMonthVisitors == 0) {
            $percentageIncrease = number_format($currentMonthVisitors > 0 ? 100 : 0,1);
        } else {
            $percentageIncrease = number_format(($currentMonthVisitors - $lastMonthVisitors) / $lastMonthVisitors * 100, 1);
        }
        //======= End Visitors=======//

        //======= Inbox ==========//
        $today = date('d');
        $totalMessages = Inbox::count();
        $todayMessages = Inbox::whereDay('created_at',$today)->count();
        //======= End Inbox ==========//

        //======= Forms ===========//
        $totalForms = Assistance::count();
        $todayForms = Assistance::whereDay('created_at',$today)->count();
        //======= End Forms ========//


        return view('admin.dashboard',[
            'paginatedVisitors'=>$paginatedVisitors,
            'visitors'=>$totalVisits,
            'percent'=>$percentageIncrease,
            'messages'=>$totalMessages,
            'todayMessages'=>$todayMessages,
            'assistance'=>$totalForms,
            'todayAssistance'=>$todayForms
        ]);
    }

    //===================== END DASHBOARD ==================================//

    //===================== INBOX ==================================//
    public function inbox(Request $request){
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

            if($request->input){
                $searchTerm = $request->input;
                $searchResults = Inbox::where('Name','like','%'. $searchTerm. '%')->orderBy('created_at','desc')->get();
                return view('admin.tables.Messages', ['Messages' => $searchResults]);
            }


            if($request->id){
                $data = Inbox::where('id',$request->id)->first();
                if($data->isRead == 0){
                    $data->isRead = 1;
                    $data->save();
                }
                return view('admin.tables.TheMessage',compact('data'));
            }
        }else{
            return view('admin.inbox');
        }
    }

    public function mark_and_delete(Request $request){
        if($request->ajax()){
            try{
                if($request->mark_id){
                    $message = Inbox::find($request->mark_id);
                    $message->isRead = !$request->mark_bool;
                    $message->save();
                    return response()->json('Done');
                }
                if($request->delete_id){
                    $message = Inbox::find($request->delete_id);
                    $message->delete();
                    return response()->json('Message Deleted');
                }
            }catch(Exception $error){
                Log::error($error->getMessage(), [
                    'line' => $error->getLine(),
                    'file' => $error->getFile()
                ]);
            }
        }
    }

    //===================== END INBOX ==================================//


    //===================== FORMS ==================================//

    public function forms(){
        return view('admin.form');
    }

    //===================== END FORMS ==================================//


    //===================== ACCOUNT ==================================//

    public function account(){
        return view('admin.account');
    }
    //===================== END ACCOUNT ==================================//


}
