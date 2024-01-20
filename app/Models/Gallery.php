<?php
namespace App\Models;

class Gallery{

    public function insertInGallery($image,$name){
        return \DB::table('gallery')->insert(["image"=>$image, "name"=>$name]);
    }

    public function getGallery(){
        return \DB::table('gallery')->select("idGallery","image","name")->get();
    }

    public function deleteGallery($id){
        return \DB::table('gallery')->where("idGallery","=",$id)->delete();
    }

    public function getImageSrc($id){
        return \DB::table('gallery')->where("idGallery","=",$id)->select("image")->first();
    }
}
