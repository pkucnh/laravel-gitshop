<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Comment_product;
use Illuminate\Support\Facades\Storage;
use App\Models\Product_images;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Mail;

class ShopController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        // $category = Category::join('menu', 'menu.id', '=', 'categories.id_menu')->select('categories.*', 'menu.id', 'menu.name','menu.slug')->get();
        // Comment_product::where('Product_id',$product_id)->join('users', 'users.id', '=', 'comment_product.User_id')->select('comment_product.*', 'users.id', 'users.name','users.img')->get();
        $products = Product::orderbyDesc('id')->paginate(6);
        $product_like = Product::orderbyDesc('like')->paginate(3);
        $product = Product::orderbyDesc('Views')->paginate(8);
        $data = [
            'menu' =>   $menu,
            'products' => $products,
            'product' => $product,
            'product_like' => $product_like, 
        ];
        return view('shop.home',$data);
    }
    // Bycategory
    public function bycategory($slug,$id)
    {
        $category = Category::all();
        $menu = Menu::all();
        if($id>0){
            $products= Product::where('Category_id',$id)->orderby('id','DESC')->paginate(6);
        }else{
            $products= Product::paginate(6);
        }

        $data = [
            'menu' =>   $menu,
            'category' =>   $category,
            'products' => $products,
        ];
        return view('shop.by-category',$data);
    }
    //Detail product
    public function detailproduct($slug,$id,Request $request)
    {
        //create detail product
        $category = Category::all();
        $product['products']= Product::where('id',$id)->limit(1)->get();
        $product_like = Product::orderbyDesc('like')->paginate(3);
        $url_canonical =  $request->url();
        //create views
        $views_product = Product::where('id',$id)->first();
        $views_product->Views = $views_product->Views +1;
        $views_product->save();
        //create related products
        foreach($product['products'] as $pro){
            $category_id = $pro->Category_id;
        }
        $productoffer= Product::where('Category_id',$category_id)->whereNotIn('id',[$id])->paginate(3);
        $data = [
            'category' =>   $category,
            'product_like' => $product_like, 
            'products' => $product['products'],
            'productoffer' => $productoffer,
            'url_canonical' => $url_canonical
        ];
        return view('shop.detail-product',$data);
    }
    // Comment 
    public function LoadComment(Request $request)
    {
        $product_id = $request->product_id;
        $output = '';
        $comment = Comment_product::where('Product_id',$product_id)->join('users', 'users.id', '=', 'comment_product.User_id')->select('comment_product.*', 'users.id', 'users.name','users.img')->get();
        foreach($comment as $key => $com){
            $output.= '<div class="row style_comment">
            <div class="col-md-2">
                <img onerror="this.src="/mylaravel/public/user/images/user.png"" src="'.asset('/user/images/'.$com->img.'').'" 
                class="img img-responsive img-thumbnail">
            </div>
            <div class="col-md-10">
                <p class="float-right col-md-3 date" style="color: #a7a7a7;">'.$com->Date.'</p>
                <p class="col-md-7" style="color: green">'.$com->name.'</p>
                <p class="col-md-7">'.$com->Content.'</p>
            </div>
        </div>
        <hr>';
        }   
        echo $output;
    }
    public function SendComment(Request $request)
    {
        $product_id = $request->product_id;
        $comment_content = $request->comment_content;
        $user_id = $request->user_id;

        $comment = new Comment_product();
        $comment->Content = $comment_content;
        $comment->Product_id = $product_id;
        $comment->User_id = $user_id;
        $comment->save();

    }
    public function Search(Request $request)
    {   
        $category = Category::all();
        $key = $request->search;
        $search = Product::where('Name','LIKE','%'.$key.'%')->paginate(6);

        $data = [
            'search' => $search,
            'category' => $category,
        ];

        return view('shop.search',$data);
    }

    public function Contact(Request $request)
    {
        $input = $request->all();
        if($input){

           $contact =  ['name'=>$input['name'],
                'email'=>$input['email'],
                'phone'=>$input['phone'],
                'message'=>$input['message']
            ];   
            \Mail::send('mail.mail_contact', ['contact'=>$contact], 
                
                function ($message) {
                    $message->from('phucnhps12099@fpt.edu.vn', 'Gitstore.com')->to('phucnh2307@gmail.com')->subject('Thư liên hệ');
            });
            Session::flash('thongbao','Đã gửi mail thành công');
        }
        return view('shop.contact');
    }
}
