<?php
namespace App\Models;

class User{

    public function getUser($loginEmail,$loginPassword){
        return \DB::table("user")
        ->select("idUser","name","lastName","email","idUserLevel")
        ->where("email", "=", $loginEmail)
        ->where("password", "=", md5($loginPassword))
        ->first();
    }

    public function getAllUsers(){
        return \DB::table('user AS u')->join("userlevel AS ul","u.idUserLevel","=","ul.idUserLevel")->select("u.idUser","u.name","lastName","email","u.idUserLevel","ul.name AS level")->where("developer","=",0)->paginate(6);
    }

    public function deleteUser($id){
        return \DB::table('user')->where("idUser","=",$id)->delete();
    }

    public function insertUser($name,$lastName,$email,$password,$level){
        return \DB::table('user')->insertGetId(["name"=>$name,"lastName"=>$lastName,"email"=>$email,"password"=>md5($password),"created"=>date("Y-m-d H:i:s"),"updated"=>date("Y-m-d H:i:s"),"idUserLevel"=>$level,"developer"=> 0]);
    }

    public function userInfo($id){
        return \DB::table("user")->where("idUser","=",$id)->select("idUser","name","lastName","email","idUserLevel")->first();
    }

    public function updateUser($id,$name,$lastName,$email,$level){
        return \DB::table("user")->where("idUSer","=",$id)->update(["name"=>$name, "lastName"=>$lastName, "email"=>$email, "idUserLevel"=>$level, "updated"=>date("Y-m-d H:i:s")]);
    }

    public function registration($name,$lastName,$email,$password){
        return \DB::table('user')->insertGetId(["name"=>$name,"lastName"=>$lastName,"email"=>$email,"password"=>md5($password),"created"=>date("Y-m-d H:i:s"),"updated"=>date("Y-m-d H:i:s"),"idUserLevel"=>1, "developer"=> 0]);
    }

    public function updateToken($token,$email){
        return \DB::table('user')->where("email","=",$email)->update(["token"=>$token]);
    }

    public function updatePassword($email,$token,$password){
        return \DB::table('user')->where("email","=",$email)->where("token","=",$token)->update(["password" => md5($password)]);
    }

    public function checkEmailExist($email){
        return \DB::table('user')->where("email","=",$email)->count();
    }

    public function checkEmailToken($email,$token){
        return \DB::table('user')->where("email","=",$email)->where("token","=",$token)->count();
    }
}
