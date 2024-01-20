<?php

namespace App\Models;

class Image{

    public function insertImage($path,$alt,$idService){
        return \DB::table('image')->insert(["path"=>$path, "alt"=>$alt, "idService"=>$idService]);
    }

    public function updateImageService($idService,$path,$alt){
        return \DB::table('image')->where("idService","=",$idService)->update(["path"=>$path,"alt"=>$alt]);
    }

    public function updateImageServiceNo($idService,$alt){
        return \DB::table('image')->where("idService","=",$idService)->update(["alt"=>$alt]);
    }
}
