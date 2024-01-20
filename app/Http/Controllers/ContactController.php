<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function page(){
        return view('front.pages.contact');
    }

    public function sendMessage(ContactRequest $request){
        $nameLastName=$request->input("nameLastName");
        $email=$request->input("email");
        $text=$request->input("text");

        $myEmailText="Stigla Vam je nova poruka od: ".$nameLastName. ", Mejl: ".$email.", Poruka: ".$text." Kako bi odgovorili na ovu poruku potrebno je otici u Admin panel." ;

        $myEmail="markoczv314@gmail.com";

        try{
            $model= new Contact();
            $insert=$model->sendMail($nameLastName,$email,$text);

            if($insert){

                // $data = [
                //     'subject' => "Nova poruka!",
                //     'name' => $nameLastName,
                //     'email' => $myEmail,
                //     'content' => $myEmailText
                // ];

                $data = [
                    'subject' => "Nova poruka!",
                    'email' => $myEmail,
                    'content' => $myEmailText
                ];

                Mail::send('front.pages.email-template', $data, function($message) use ($data){
                    $message->to($data['email'])
                    ->subject($data['subject']);
                });

                return redirect()->back()->with('message','Mejl je uspešno poslat!');

            }else{
                return redirect()->back()->with('message','Mejl nije poslat!');
            }

        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }
}
