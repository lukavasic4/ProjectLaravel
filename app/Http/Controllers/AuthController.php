<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Login;
use App\Models\Register;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function doRegister(RegisterRequest $request){
        $first_name = $request->input("first_name");
        $last_name = $request->input("last_name");
        $email = $request->input("email");
        $password = $request->input("password");

        $model = new Register();
        try {
            $user = $model->insertUser($first_name,$last_name,$email,$password);
            if($user){
                return \redirect("/login")->with("message","Successfuly register");
            }else{
                return \redirect("/register")->with("message","You are not register");
            }
        }
        catch (QueryException $exception){
            Log::error("Error registration" . $exception->getMessage());
            return response(['message' => $exception->getMessage()],404);
        }
    }
    public function doLogin(LoginRequest $request){
        $email = $request->input('logEmail');
        $password = $request->input('logPassword');

        $model = new Login();
        try {
            $user = $model->getByEmailAndPassword($email, $password);
            if($user){
                $request->session()->put("user",$user);
                return \redirect("/")->with("message","Success login");
            }else{
                return \redirect("/login")->with("message","Not success login");
            }
        }
        catch (QueryException $exception){
            return response(['message' => $exception->getMessage()],404);
        }
    }
    public function logout(Request $request){
        $request->session()->forget("user");
        $request->session()->flush();
        return redirect("/login")->with("message", "You are logged out");
    }
}
