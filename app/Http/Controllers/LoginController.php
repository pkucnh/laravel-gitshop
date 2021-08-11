<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\user;
use App\Models\Social;
use App\Models\Login;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Comment_product;
use App\Models\Orders;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Http\Requests\checklogin;

class LoginController extends Controller
{
    // public function Authlogin()
    // {
    //     $admin_id = Auth::id();
    //     if($admin_id){
    //        return redirect::to('dashboard');
    //     }else{
    //        return redirect::to('login')->send();
    //     }
    // }
    public function dashboard()
    {
        // $this->Authlogin();
        $order = Orders::all()->first();
        $user = User::all()->first();
        $category = Category::all()->first();
        $comment = Comment_product::all()->first();

        $count_order = $order->count();
        $count_user = $user->count();
        $count_category = $category->count();
        $count_comment =  $comment->count();

        $data = [
            'count_order' => $count_order,
            'count_user' => $count_user,
            'count_category' => $count_category,
            'count_comment' => $count_comment,
        ];
        return view('admin.dashboard',$data);
    }
    // get login and latidator
    
    // function index(Request $request)
    // {
    //     return view('login.index');
    // }
    public function LoginAdmin(Request $request){      
     
        $admin_id = Auth::id();
        if($admin_id){
           return redirect::to('dashboard');
        }
        if($request->isMethod('post')){
            //check user
            $admin_id = Auth::id();
            if($admin_id){
               return redirect::to('dashboard');
            }
            $messages = [
                'email.required' => 'Email không được bỏ trống',
                'password.required' => 'Password không được bỏ trống'
                ];
                $validatedData = $request->validate([
                    'email' => 'bail|required|email',
                    'password' => 'bail|required|max:255'
                ],$messages);       

            $email = $request->input('email') ;
            $password = $request->input('password') ;


            // Check nếu có coupon trước khi đăng nhập
            if(Session::get('coupon')){
                Session::forget('coupon');
            }
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                $user = Auth::user();
                return Redirect::to("dashboard");
            }
                return Redirect::to('login')->withInput()->withErrors(['message'=>'Tài khoản không tồn tại !!!']);     
        }
        return view('login.index');
  
    }
    //logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    //register
    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $messages = [
           'email.required' => 'Email is not left blank!!!',
           'password.required' => 'Password cannot be left blank!!!',
           'name.required' => 'Name cannot be left blank!!!',
           'password_confirm.required' => 'Confirm-Password cannot be left blank!!!'
       ];
           $validatedData = $request->validate([
               'email' => 'bail|required|email',
               'password' => 'bail|required|max:9',
               'name' => 'bail|required|min:0',
               'password_confirm' => 'bail|required|max:9'
           ],$messages);

            $name = $request->input("name");
            $email = $request->input("email");
            $password = $request->input("password");
            $password_confirm = $request->input("password_confirm");
            $hashedPassword = md5($password);
   
            $user = new user();
            $user->name = $name;
            $user->email = $email;
            $user->password = $hashedPassword;
            $users = DB::table('users')->where('email',$email)->first();
            if($password!=$password_confirm){
                return Redirect::to('register')->withInput()->withErrors(["erro"=>"Import password not match!!!"]);
            }
            if($users){
                return Redirect::to('register')->withInput()->withErrors(["erro"=>"Account already exists!!!"]);
            }
            else{
                $user->save();
                return Redirect::to('register')->withInput()->withErrors(["erro"=>"Account registration is successful!!!"]);
            }
       }
       return view('login.register');
    } 
    //đăng nhập người dùng
    public function LoginUser(Request $request){    
        if($request->isMethod('post')){
        $user = $request->all();     
        // $password = $request->input("password");
        // $email = $request->input("email");

            $messages = [
                'email.required' => 'Email không được rỗng!',
                'password.required' => 'Mật khẩu không được rỗng!'
                ];
            $validatedData = $request->validate([
                'email' => 'bail|required|email',
                'password' => 'bail|required|max:25|min:1'
            ],$messages);       

            // $email = $request->input("email");
            // $password =  $request->input("password");
            $email = $user['email'];
            $password =  $user['password'];
            $user_pass = md5($password);

            $arr = $request->only(["email", "password"]);
            //Check nếu có coupon trước khi đăng nhập
            if(Session::get('coupon')){
                Session::forget('coupon');
                Session::forget('cart');
            }
            $result = User::where('email',$email)->where('password',$user_pass)->first();
            if($result){
                Session::put('customer_name',$result->name);
                Session::put('customer_id',$result->id);
                Session::put('customer_img',$result->img);
                return Redirect::to("/");
            }
                return Redirect::to('dang-nhap')->withInput()->withErrors(['message'=>'Tài khoản không tồn tại!']);     
        }
        $category = Category::all();
        $data = [
            'category' =>  $category,
        ]; 
        return view('login.login_user',$data);
    }
    public function LogoutUser(Request $request)
    {
        Auth::logout();
        Session::put('customer_id',null);
        Session::put('coupon',null);
        Session::put('customer_name',null);
        Session::put('customer_img',null);
        Session::forget('cart');
        return redirect('/dang-nhap');
    }
    // Đăng nhập bằng Facebook
    public function LoginFacebook(){
        return Socialite::driver('facebook')->redirect();
        }
        
    public function CallbackFacebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri
            $account_name = user::where('id',$account->user)->first();
            Session::put('customer_name',$account_name->name);
            Session::put('customer_id',$account_name->id);

            return redirect('/')->with('message', 'Đăng nhập thành công');
        }else{
            $hieu = new Social([
                'provider_user_id' =>$provider->getId(),
                'provider' =>'facebook'
            ]);
        $orang = user::where('email',$provider->getEmail())->first();
        
        if(!$orang){
            $orang = user::create([
            
                'name' =>$provider->getName(),
                'email' =>$provider->getEmail(),
                'password' =>'',
                'level' =>0
            ]);
        }
        $hieu->login()->associate($orang);
        $hieu->save();
        
        $account_name = user::where('id',$account->user)->first();
        
        Session::put('customer_name',$account_name->name);
        Session::put('customer_id',$account_name->id);
        return redirect('/')->with('message', 'Đăng nhập thành công');
        }
    }
    //Đăng nhập bằng Google
    public function LoginGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function CallbackGoogle(){
        $users = Socialite::driver('google')->stateless()->user(); 
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        $account_name = User::where('id',$authUser->user)->first();
        Session::put('customer_name',$account_name->name);
        Session::put('customer_id',$account_name->id);
        return redirect('/')->with('message', 'Đăng nhập thành công');
      
       
    }
    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){

            return $authUser;
        }
      
        $hieu = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
        ]);

        $orang = user::where('email',$users->email)->first();

            if(!$orang){
                $orang = user::create([
                    'name' => $users->name,
                    'email' => $users->email,
                    'password' => '',

                    'phone' => '',
                    'level' => 0
                ]);
            }
        $hieu->login()->associate($orang);
        $hieu->save();

        $account_name = user::where('id',$authUser->user)->first();
        Session::put('custommer_name',$account_name->name);
        Session::put('customer_id',$account_name->id);
        return redirect('/')->with('message', 'Đăng nhập thành công');


    }

    // dang ky hoc sinh

    public function dangkyhs(Request $request)
    {
        if($request->isMethod('post')){
            $messages = [
           'email.required' => 'Email không được bỏ trống',
           'password.required' => 'Mật khẩu không được bỏ trống',
           'name.required' => 'Tên không được bỏ trống',
           
           'password_confirm.required' => 'Nhập lại mật khẩu không được bỏ trống'

       ];
           $validatedData = $request->validate([
    
               'email' => 'bail|required|email',
               'password' => 'bail|required|max:9',
  
               'name' => 'bail|required|min:0',
               'password_confirm' => 'bail|required|max:9'
           ],$messages);

            $name = $request->input("name");
            $email = $request->input("email");

            $password = $request->input("password");
            $password_confirm = $request->input("password_confirm");
            $hashedPassword = md5($password);
   
            $user = new user();
            $user->name = $name;
            $user->email = $email;

            $user->password = $hashedPassword;
            $users = DB::table('users')->where('email',$email)->first();
            if($password!=$password_confirm){
                return Redirect::to('register')->withInput()->withErrors(["erro"=>"Nhập lại mật khẩu không đúng!!!"]);
            }
            if($users){
                return Redirect::to('register')->withInput()->withErrors(["erro"=>"Tài khoản đã tồn tại"]);
            }
            else{
                $user->save();
                return Redirect::to('register')->withInput()->withErrors(["erro"=>"Đăng ký thành công"]);
            }
       }
       return view('login.registers');
    } 
}
