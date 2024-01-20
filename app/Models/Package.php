<?php
namespace App\Models;

class Package{
    public function editPackage($id,$price,$name){
        return \DB::table('package')->where("idPackage","=",$id)->update(["price"=>$price, "name"=>$name]);
    }

    public function packages(){
        return \DB::table('package')->select("name","price","idPackage")->get();
    }

    public function onePackage($id){
        return \DB::table('package')->select("idPackage","name","price")->where("idPackage","=",$id)->first();
    }
}
