<?php

namespace App\Http\Controllers;


use App\user;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Response;


class loginController extends Controller
{
    // get login and latidator
    public function index(Request $request){       
        if($request->isMethod('post')){
             $messages = [
            'email.required' => 'Email không được bỏ trống !!!',
            'password.required' => 'Password không được bỏ trống!!!'
        ];
            $validatedData = $request->validate([
                'email' => 'bail|required|email',
                'password' => 'bail|required|max:9'
            ],$messages);

            $arr = [
                'email' => $request ->email,
                'password' =>$request->password

            ];
            if(Auth::attempt($arr)){
                return Redirect::to("home");
            }else{
                return Redirect::to('logins')->withInput()->withErrors(['message'=>'Email hoặc password không chính xác!!!']);
            }
            return back()->withInput();
        }
        return view('login.index');
    }
    //logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/logins');
    }
    //register

    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $messages = [
           'email.required' => 'Email không được bỏ trống !!!',
           'password.required' => 'Password không được bỏ trống!!!'
       ];
           $validatedData = $request->validate([
               'email' => 'bail|required|email',
               'password' => 'bail|required|max:9'
           ],$messages);

           $email = $request->input("email");
           $password = $request->input("password");
           $hashedPassword = Hash::make($password);
           if(Auth::attempt(['email' => $email, 'password' => $password])){
                        Redirect::to("admin");
                    }else{
                        return Redirect::to('login/index')->withInput()->withErrors("Email hoặc password không chính xác!!!");
                    }
                    return back()->withInput();
       }
       return view('login.index');
    } 
}
