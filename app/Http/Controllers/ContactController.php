<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssistanceRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Assistance;
use App\Models\Inbox;
use Exception;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    //===================== CONTACT ==========================//
    public function contact()
    {
        return view('Contact');
    }

    public function send_contact(ContactRequest $request){
        //date_default_timezone_set('Asia/Manila');
        try{
            $validatedData = $request->validated();
            $message = new Inbox;
            $message->fill($validatedData);
            $message->Location = session()->get('Country');
            $message->save();
            return back()->with(['success' => 'Message sent!']);
        }catch(Exception $error){
            Log::error($error->getMessage(), [
                'line' => $error->getLine(),
                'file' => $error->getFile()
            ]);
        }
    }

    //===================== END CONTACT ==========================//

    //===================== REQUEST ASSISTANCE ==========================//

    public function tulong()
    {
        return view('TulongView');
    }
    public function send_request(AssistanceRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $assistance = new Assistance;

            if ($request->hasFile('File_1')) {
                $FileName = $validatedData['LastName'] . "_" . date('Y') . "." . $validatedData['File_1']->getClientOriginalExtension();
                $Path = $validatedData['FirstName'] . "_" . date('Y') . "/";

                $FilePath = $validatedData['File_1']->storeAs($Path, $FileName, 'public');
                $assistance->File_1 = $FilePath;
            }

            if ($request->hasFile('File_2')) {
                $FileName = $validatedData['LastName'] . "_" . date('Y') . "." . $validatedData['File_2']->getClientOriginalExtension();
                $Path = $validatedData['FirstName'] . "_" . date('Y') . "/";

                $FilePath = $validatedData['File_2']->storeAs($Path, $FileName, 'public');
                $assistance->File_2 = $FilePath;
            }

            if ($request->hasFile('File_3')) {
                $FileName = $validatedData['LastName'] . "_" . date('Y') . "." . $validatedData['File_3']->getClientOriginalExtension();
                $Path = $validatedData['FirstName'] . "_" . date('Y') . "/";

                $FilePath = $validatedData['File_3']->storeAs($Path, $FileName, 'public');
                $assistance->File_3 = $FilePath;
            }

            $fields = ['FirstName', 'MiddleName', 'LastName', 'PassportNumber', 'SaudiResidenceID', 'Gender', 'EmailOrFacebook', 'Occupation', 'PersonalTele', 'OtherTele', 'LocationKSA', 'EmployerName', 'EmployerTele', 'RecruitmentAgencySaudi', 'RecruitmentAgencyPhilippines', 'Complaint','Location'];

            foreach ($fields as $field) {
                if (isset($validatedData[$field])) {
                    $assistance->$field = $validatedData[$field];
                }
                if($field == "Location"){
                    $assistance->$field = session()->get('Country');
                }
            }
            $assistance->save();

            return back()->with(['success' => 'Form submitted!']);
        } catch (Exception $error) {
            Log::error($error->getMessage(), [
                'line' => $error->getLine(),
                'file' => $error->getFile()
            ]);
        }
    }
    //===================== END REQUEST ASSISTANCE ==========================//
}
