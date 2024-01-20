<?php
namespace App\Models;

class Key{

    public function getKey(){
        return \DB::table('registrationkey')->select("idRegistrationKey","registrationKey")->first();
    }

    public function updateKey($key){
        return \DB::table('registrationkey')->where("idRegistrationKey","=",1)->update(["registrationKey"=>$key]);
    }
}
