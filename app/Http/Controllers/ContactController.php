<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssistanceRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\MembershipRequest;
use App\Models\Assistance;
use App\Models\Inbox;
use App\Models\Member;
use Exception;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class ContactController extends Controller
{
    //===================== CONTACT ==========================//
    public function contact()
    {
        return view('Contact');
    }

    public function send_contact(ContactRequest $request){
        try{
            $validatedData = $request->validated();
            $message = new Inbox;
            $message->fill($validatedData);
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

            $fields = ['FirstName', 'MiddleName', 'LastName', 'PassportNumber', 'SaudiResidenceID', 'Gender', 'EmailOrFacebook', 'Occupation', 'PersonalTele', 'OtherTele', 'LocationKSA', 'EmployerName', 'EmployerTele', 'RecruitmentAgencySaudi', 'RecruitmentAgencyPhilippines', 'Complaint','Location','Coordinates'];

            foreach ($fields as $field) {
                if (isset($validatedData[$field])) {
                    $assistance->$field = $validatedData[$field];
                }
                if($field == "Location"){
                    $assistance->$field = $validatedData['Location'];
                }
                if($field == "Coordinates"){
                    $assistance->$field = $validatedData['Latitude_Longitude'];
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

    //===================== MEMBERSHIP ======================================//

    public function membership(){
        return view('MembershipView');
    }

    public function send_membership(MembershipRequest  $request)
    {
        $validatedInfo = $request->validated();
        $newMember = new Member;
        $newMember->member_id = Uuid::uuid4()->toString();
        $newMember->fill($validatedInfo);

        try{
            if($newMember->save()){
                return back()->with(['success' => 'Form submitted!']);
            }else{
                return back()->withErrors(['error'=>"Form was not submitted!"]);
            }

        }catch(Exception $error){
            Log::error($error->getMessage(), [
                'line' => $error->getLine(),
                'file' => $error->getFile()
            ]);
        }
    }

    //===================== END MEMBERSHIP ==================================//
}
