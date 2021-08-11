<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // check login
    // public function Authlogin()
    // {
    //     $admin_id = session::get('admin_id');
    //     if($admin_id){
    //        return redirect::to('dashboard');
    //     }else{
    //        return redirect::to('logins')->send();
    //     }
    // }

    public function index()
    {
        // $this->Authlogin();
        $data = User::all();
        return view('user.index',compact('data'));
    }
    public function add(Request $request)
    {
        // $this->Authlogin();
        if($request->isMethod('post')){
            // Validator
            $messages = [
                'email.required' => 'Email is not left blank!!!',
                'password.required' => 'Password cannot be left blank!!!',
                'name.required' => 'Name cannot be left blank!!!',
            ];
                $validatedData = $request->validate([
                    'email' => 'bail|required|email',
                    'password' => 'bail|required|max:9',
                    'name' => 'bail|required|max:25',
                ],$messages);

            $name = $request->input("name");
            $email = $request->input("email");
            $password = $request->input("password");
            $hashedPassword =  bcrypt($password);
            $address = $request->input("address");
            $note = $request->input("note");
            $image = $request->file('img');
            // upload image
            $imageName = $image->getClientOriginalName();                                 
            $storedPath = $image->move('user/images', $image->getClientOriginalName());

            $users = DB::table('users')->where('email',$email)->first();
            if($users){
                return Redirect::to('user/add')->withInput()->withErrors(["erro"=>"Account already exists!!!"]);
            }
            $product = new User();
 
            $product->Name = $name;
            $product->email = $email;
            $product->password = $hashedPassword;
            $product->img =  $imageName;
            $product->Address = $address;
            $product->Note = $note;

            $product->save();

            return Redirect::to("user/index");
        }
        return view('user.add-user');
    }
    public function update($id,Request $request)
    {   
        // $this->Authlogin();
        $data_view = array();
        $user= User::find($id);
        $data_view["user"] = $user; 
        if($request->isMethod('post')){
        // Validator
            $messages = [
                'name.required' => 'Name cannot be left blank!!!',
            ];
            $validatedData = $request->validate([
                'name' => 'bail|required|max:25',
            ],$messages);
            
            $name = $request->input("name");
            $address = $request->input("address");
            $note = $request->input("note");
            $image = $request->file('img');
            // upload image
            $imageName = $image->getClientOriginalName();                                 
            $storedPath = $image->move('user/images', $image->getClientOriginalName());

            $user->Name = $name;
            $user->img =  $imageName;
            $user->Address = $address;
            $user->Note = $note;
            $user->save();
            return Redirect::to("user/index");
        }
        return view('user.update-user',$data_view);
    }
    public function delete($id,Request $request)
    {   
        // $this->Authlogin();
    //    $id = $request->id? $request->id:0;
        // if($id>0){
            $user = User::find($id);
            $user->delete();
            // echo "Deleted successfully!!!";
            // exit();
        // }
        return Redirect::to("user/index");
    }
    public function ShowLevel(Request $request)
    {
        $data = User::all();
        return view('level.index',compact('data'));
    }
    public function UpLevel($id,Request $request)
    {
   
        $user = User::find($id);
       
        $customer = User::all();
        if($request->isMethod('post')){
            $dete = $request->all();
            $user->level =  $dete['level'];  
            $user->save();

            return Redirect::to("level/index");
        }

        $data = [
            'user' => $user,
            'customer' =>  $customer,
        ];
        return view('level.up',$data);
    }
}
