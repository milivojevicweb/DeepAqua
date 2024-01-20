<?php
namespace App\Models;

class Level{

    public function getLevel(){
        return \DB::table('userlevel')->select("idUserLevel","name")->get();
    }
}
