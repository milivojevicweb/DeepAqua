<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ResetPasswordMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $token=$_GET['token'];
        $email=$_GET['email'];

        if(isset($token) && isset($email)){
            $model=new User();
            $checkEmailtoken=$model->checkEmailToken($email,$token);
                if($checkEmailtoken==1){
                    return $next($request);
                }else{
                    return \redirect("/zaboravljenaLozinka")->with("message","Pogresan mejl ili token!");
                }

        }else{
            return \redirect("not-found");
        }

    }
}
