<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\Key;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthenticationController extends Controller
{
    public function loginPage(){
        return view('front.pages.login');
    }

    public function registrationPage(){
        return view('front.pages.registration');
    }

    public function forgotPasswordPage(){
        return view("front.pages.forgotPassword");
    }

    public function resetPasswordPage(){
        return view("front.pages.resetPassword");
    }

    public function login(LoginRequest $loginRequest){
        $loginEmail=$loginRequest->input('loginEmail');
        $loginPassword=$loginRequest->input('loginPassword');

        try{

            $model= new User();
            $user=$model->getUser($loginEmail,$loginPassword);


            if($user){

                $loginRequest->session()->put("user", $user);
                if($user->idUserLevel==1){
                    return \redirect("/")->with("message", "Korisnik je ulogovan!");
                }else{
                    return \redirect("/admin")->with("message", "Korisnik je ulogovan!");
                }
            } else {
                return redirect("/prijava")->with("message", "Greška!");
            }

        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }

    }

    public function logout(Request $request){
        $request->session()->remove("user");
        return redirect("/");
    }

    public function registration(RegistrationRequest $request){
        if($request->has("submit")){


            $modelKey=new Key();
            $key=$modelKey->getKey()->registrationKey;

            $userKey=$request->input("key");

            try{

                if($key==$userKey){
                    $name=$request->input('name');
                    $lastName=$request->input('lastName');
                    $email=$request->input('email');
                    $password=$request->input('password');
                    $repeatPassword=$request->input('repeatPassword');

                    $model = new User();
                    $checkEmail=$model->checkEmailExist($email);

                    if($checkEmail==0){

                        if($password!=$repeatPassword){
                            return \redirect("/login")->with("message", "Ponovljena lozinka nije dobra!");
                        }else{

                            $user=$model->registration($name,$lastName,$email,$password);


                            if($user){
                                return redirect()->back()->with('message','Uspešno!');
                            } else {
                                return redirect()->back()->with('message','Greška!');
                            }

                        }

                    }else{
                        return redirect()->back()->with('message','Mejl adresa već postoji!');
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

    public function forgotPassword(Request $request){
        $email=$request->input("email");

        $token=rand(143,1111999)+time();
        $message="Link za aktivaciju lozinke: https://deepaqua.000webhostapp.com/obnavljanjeLozinke?token=".$token."&email=".$email;

        try{

            $model= new User();

            $checkEmail=$model->checkEmailExist($email);

            if($checkEmail>=1){

                $data = [
                    'subject' => "Resetovanje lozinke",
                    'email' => $email,
                    'content' => $message,
                    'name'=> "Deep Aqua"
                ];

                \Mail::send('front.pages.email-template', $data, function($message) use ($data){
                    $message->to($data['email'])
                    ->from($data['email'] ,$data['name'])
                    ->subject($data['subject']);
                });


                $updateToken=$model->updateToken($token,$email);

                if($updateToken){
                    return redirect()->back()->with('message','Kod je poslat na mejl!');
                } else {
                    return redirect()->back()->with('message','Pogresan mejl!');
                }

            }else{
                return redirect()->back()->with('message','Pogresan mejl!');
            }

        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function resetPassword(ResetPasswordRequest $request){
        $email=$request->input('email');
        $token=$request->input('token');
        $password=$request->input('password');
        $repeatPassword=$request->input('rePassword');



        if($password==$repeatPassword){

            try{
                $model=new User();
                $reset=$model->updatePassword($email,$token,$password);
                if($reset){
                    return redirect('/prijava')->with('message','Lozinka je uspešno promenjena!');
                } else {
                    return redirect('/prijava')->with('message','Lozinka nije promenjena!');
                }
            }catch(\QueryException $ex) {
                return redirect()->back()->with('message','Greška!');
                \Log::error($ex->getMessage());
            }
        }else{
            return redirect()->back()->with('message',"Ponovljena lozinka nije ista");
        }
    }

}
