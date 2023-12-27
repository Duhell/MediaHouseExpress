<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssistanceRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //===================== CONTACT ==========================//
    public function contact(){return view('Contact');}
    //===================== END CONTACT ==========================//

    //===================== REQUEST ASSISTANCE ==========================//

    public function tulong(){return view('TulongView');}
    public function send_request(AssistanceRequest $request){
        $validatedData = $request->validated();
        return back()->with(['success'=>'Form submitted!']);
    }
    //===================== END REQUEST ASSISTANCE ==========================//


}
