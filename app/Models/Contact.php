<?php
namespace App\Models;

class Contact{

    public function sendMail($name,$email,$text){
        return \DB::table('contact')->insert(["nameLastName"=>$name, "email"=>$email, "text"=>$text, "status"=>0, "date"=>date("Y-m-d H:i:s")]);
    }

    public function getContact(){
        return \DB::table('contact')
        ->select("idContact","nameLastName","email","text","status","date","datesend")->orderBy('idContact', 'ASC')->paginate(6);
    }

    public function contactPagination(){
        return \DB::table('contact')
        ->select("idContact","nameLastName","email","text","status","date","datesend")
        ->paginate(6);
    }

    public function deleteContact($id){
        return \DB::table('contact')->where("idContact",$id)->delete();

    }

    public function contactNumber(){
        return \DB::table('contact')->where("status","=",0)->count();
    }

    public function getOneContact($id){
        return \DB::table("contact")->where("idContact","=",$id)->select("idContact","nameLastName","email","text","status","date","datesend")->first();
    }

    public function changeStatus($status,$id){
        return \DB::table('contact')->where("idContact","=",$id)->update(["status"=>$status, "datesend"=>date("Y-m-d H:i:s")]);
    }
}
