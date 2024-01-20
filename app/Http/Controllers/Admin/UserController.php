<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\IdRequest;
use App\Models\Key;
use App\Models\Level;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class UserController extends AdminController
{
    public function getUser(){
        try{

            $model= new User();
            $users=$model->getAllUsers();
            $this->data['users']=$users;
            return view("admin.pages.user.table",$this->data);

        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function fetch_data(Request $request){
        if($request->ajax()){
            $model= new User();
            $users=$model->getAllUsers();
            return response()->json($users);
        }
    }

    public function deleteUser(IdRequest $request){
        $id=$request->input('id');
        if(isset($id)){

            try{
                $model= new User();
                $delete=$model->deleteUser($id);
            }catch(\Exception $ex) {
                return redirect()->back()->with('message','Greška!');
                \Log::error($ex->getMessage());
            }
        }
    }

    public function ajaxGetUser(){

        try{

            $model= new User();
            $users= $model->getAllUsers();
            return response()->json($users);

        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function getKey(){
        try{
            $model= new Key();
            $key= $model->getKey();
            $this->data['key']=$key;
            return view("admin.pages.user.key",$this->data);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function updateKey(Request $request){

        try{
            $key=$request->input('key');
            $model=new Key();
            $result=$model->updateKey($key);

            if($result){
                return redirect()->back()->with('message','Uspešno ažuriran ključ!');
            }else{
                return redirect()->back()->with('message','Greška!');
            }
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function addUserPage(){
        try{
            $model= new Level();
            $level=$model->getLevel();
            $this->data['level']=$level;
            return view("admin.pages.user.insert", $this->data);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }

    }

    public function addUser(AddUserRequest $request){

        if ($request->has('user')) {

            try{

                $modelKey=new Key();
                $key=$modelKey->getKey()->registrationKey;

                $userKey=$request->input("key");

                if($key==$userKey){

                    $name=$request->input('name');
                    $lastName=$request->input('lastName');
                    $email=$request->input('email');
                    $password=$request->input('password');
                    $repeatPassword=$request->input('repeatPassword');
                    $level=$request->input('level');

                    $model = new User();

                    $checkEmail=$model->checkEmailExist($email);

                    if($checkEmail==0){

                        if($password!=$repeatPassword){
                            return \redirect("/login")->with("message", "Ponovljena lozinka nije dobra!");
                        }else{

                                $user=$model->insertUser($name,$lastName,$email,$password,$level);


                                if($user){
                                    return redirect()->back()->with('message','Uspešno!');
                                } else {
                                    return redirect()->back()->with('message','Greška');
                                }

                        }
                    }else{
                        return redirect()->back()->with('message','Uneti mejl postoji!');
                    }
                }else{
                    return redirect()->back()->with('message','Pogrešan ključ!');
                }
            }catch(\Exception $ex) {
                return redirect()->back()->with('message','Greška!');
                \Log::error($ex->getMessage());
            }

        }
    }

    public function editUserPage($id){
        if(isset($id)){

            try{
                $modelUser= new User();
                $user=$modelUser->userInfo($id);
                $this->data['user']=$user;

                $modelLevel= new Level();
                $level= $modelLevel->getLevel();

                $this->data['level']=$level;

                return view("admin.pages.user.edit",$this->data);

            }catch(\Exception $ex) {
                return redirect()->back()->with('message','Greška!');
                \Log::error($ex->getMessage());
            }
        }
    }

    public function editUser(EditUserRequest $request){
        if ($request->has('user')) {

            $name=$request->input('name');
            $lastName=$request->input('lastName');
            $email=$request->input('email');
            $level=$request->input('level');
            $id=$request->input('id');

            try{

                $model = new User();
                $update=$model->updateUser($id,$name,$lastName,$email,$level);

                if($update){
                    return \redirect()->back()->with('message','Uspešno!');
                } else {
                    return \redirect()->back()->with('message','Greška!');
                }

            }catch(QueryException $ex) {
                return redirect()->back()->with('message','Greška!');
                \Log::error($ex->getMessage());
            }
    }
    }
}
