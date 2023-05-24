<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VacancyApply;
use App\Rules\ReCaptchaSuggest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Contact;

class FormApplicationsController extends Controller
{

    public function vacancy(Request  $request, $id){

        $file=$request->file;





        $this->validate($request,[
            "name"=>"required",
            "phone"=>"required",
            "email"=>"required|email",
            "message"=>"required",
            'g-recaptcha-response' => ['required', new ReCaptchaSuggest('suggest')]

        ]);


        $vacancy= VacancyApply::create([
            "name"=>$request->name,
            "phone"=>$request->phone,
            "email"=>$request->email,
            "message"=>$request->message,
            "vacancy_id"=>$id,
        ]);

        Mail::send('emails.vacancy', ['vacancy'=>$vacancy], function ($message) use($file, $request){


            $message->from('efqanesc@gmail.com');
            $message->to(settings('cooperation-e-apply','efqanesc@gmail.com'))->subject('Vakansiyaya Mwraciət');


            if($file) {

                $message->attach($file->getRealPath(),[
                    'as' => $file->getClientOriginalName(), // If you want you can chnage original name to custom name
                    'mime' => $file->getMimeType()
                ]);

            }
        });






        $vacancy->addMedia($request->file)
            ->setFileName($request->file->hashName())
            ->usingFileName($request->file->hashName())
            ->toMediaCollection('vacany-apply-file');
















        return redirect()->back()->withSuccess(__('frontend.success_vacancy_apply'));





















    }

    public function contact(Request  $request){

        $this->validate($request,[
           "name"=>"required",
           "phone"=>"required",
           "email"=>"required|email",
           "message"=>"required",
           "birthday"=>"required",
           "address"=>"required",
            'g-recaptcha-response' => ['required', new ReCaptchaSuggest('suggest')]

        ]);

        $contact=Contact::create([
            "name"=>$request->name,
            "phone"=>$request->phone,
            "email"=>$request->email,
            "message"=>$request->message,
            "birthday"=>$request->birthday,
            "address"=>$request->address,
        ]);

//        Mail::send('emails.contact',['contact'=>$contact],function ($message)   {
//
//                $message->to( settings('cooperation-e-apply','efqanesc@gmail.com') )
//                    ->subject('Əlaqə məlumatları') ;
//
//
//        });



        return redirect()->back()->withSuccess(__('frontend.contact_success_message'));
    }

}
