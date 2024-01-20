<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\IdRequest;
use App\Http\Requests\SendAnswerRequest;
use App\Http\Requests\SendMailRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends AdminController
{
    public function pageContact(){
        return view('admin.pages.contact.table');
    }

    public function sendPage(){
        return  view('admin.pages.contact.send',$this->data);
    }

    public function getContact(){
        try{
            $model=new Contact;
            $contact=$model->getContact();
            $this->data['contact']=$contact;
            return view("admin.pages.contact.table",$this->data);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function fetch_data(Request $request){
        if($request->ajax()){
            $model=new Contact();
            $data=$model->contactPagination();
            return response()->json($data);
        }
    }

    public function deleteContact(IdRequest $request){
        $id=$request->input('id');
        if(isset($id)){
            try{
                $model=new Contact();
                $delete=$model->deleteContact($id);
            }catch(\Exception $ex) {
                return redirect()->back()->with('message','Greška!');
                \Log::error($ex->getMessage());
            }
        }
    }

    public function ajaxGetContact(){
        try{
            $model=new Contact();
            $contact=$model->getContact();
            return response()->json($contact);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function getContactText($id){
        try{
            $model=new Contact();
            $contact=$model->getOneContact($id);
            return response()->json($contact);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function sendAnswer(SendAnswerRequest $request){
        $text=$request->input("text");
        $email=$request->input("email");
        $id=$request->input("id");
        $status=1;


        $data = [
            'subject' => "Odgovor",
            'email' => $email,
            'name' => "Deep Aqua",
            'content' => $text
        ];

        Mail::send('front.pages.email-template', $data, function($message) use ($data){
            $message->to($data['email'])
            ->from($data['email'] ,$data['name'])
            ->subject($data['subject']);
        });

        try{

            $model=new Contact();
            $contact=$model->changeStatus($status,$id);

        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function sendMail(SendMailRequest $request){
        $subject=$request->input('subject');
        $email=$request->input('email');
        $text=$request->input('summary-ckeditor');

        $data = [
            'subject' => $subject,
            'email' => $email,
            'name' => "Deep Aqua",
            'content' => $text
        ];

        Mail::send('front.pages.email-template', $data, function($message) use ($data){
            $message->to($data['email'])
            ->from($data['email'] ,$data['name'])
            ->subject($data['subject']);
        });

        return redirect()->back()->with('message','Mejl je poslat!');

    }
}
