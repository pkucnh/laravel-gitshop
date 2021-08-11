<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Product_images;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
        public function index()
        {
                $data = Product::orderby('id','DESC')->get();
                return view('product.index',compact('data'));
        }

        public function add(Request $request)
        {
            $data = Category::all();
            if($request->isMethod('post')){
                $name = $request->input("name");
                $price = $request->input("price");
                $menu_id = $request->input("menu_id");
                $category_id = $request->input("category_id");
                $amount = $request->input("amount");
                $note = $request->input("note");
                $image = $request->file('img');
                $image1 = $request->file('img1');
                $image2 = $request->file('img2');
                $image3 = $request->file('img3');
                $slug = Str::slug($name,"-");



                // upload image
                $imageName = $image->getClientOriginalName();  
                $storedPath = $image->move('product/images', $image->getClientOriginalName());
                if(!$image1 && !$image2 && !$image3 ){
                    $imageName1 = '';
                    $imageName2 = '';
                    $imageName3 = '';
                }else{
                $imageName1 = $image1->getClientOriginalName();  
                $imageName2 = $image2->getClientOriginalName();  
                $imageName3 = $image3->getClientOriginalName();  
                $storedPath1 = $image1->move('product/images', $image1->getClientOriginalName());
                $storedPath2 = $image2->move('product/images', $image2->getClientOriginalName());
                $storedPath3 = $image3->move('product/images', $image3->getClientOriginalName());
                }
    
                $product = new Product();
    
                $product->Name = $name;
                $product->Price = $price;
                $product->Slug = $slug;
                $product->img =  $imageName;
                $product->img1 =  $imageName1;
                $product->img2 =  $imageName2;
                $product->img3 =  $imageName3;
                $product->Category_id = $category_id;
                $product->id_menu= $menu_id;
                $product->Amount = $amount;
                $product->Note = $note;

                $product->save();
                return Redirect::to("product/index");
            }
            return view('product.add_product', compact('data'));
        }
        public function update($id,Request $request)
        {   
            // $data = DB::table("categories")->select("*");
            $data = Category::all();
            $data_view = array();
            $product= Product::find($id);
            $data_view["product"] = $product; 
            if($request->isMethod('post')){
                $name = $request->input("name");
                $price = $request->input("price");
                $image = $request->file('img');
                $image1 = $request->file('img1');
                $image2 = $request->file('img2');
                $image3 = $request->file('img3');
                $category_id = $request->input("category_id");
                $menu_id = $request->input("menu_id");
                $amount = $request->input("amount");
                $note = $request->input("note");
                $slug = Str::slug($name,"-");

                $imageName = $image->getClientOriginalName();
                $imageName1 = $image1->getClientOriginalName();  
                $imageName2 = $image2->getClientOriginalName();  
                $imageName3 = $image3->getClientOriginalName();       

                $storedPath = $image->move('product/images', $image->getClientOriginalName());
                $storedPath1 = $image1->move('product/images', $image1->getClientOriginalName());
                $storedPath2 = $image2->move('product/images', $image2->getClientOriginalName());
                $storedPath3 = $image3->move('product/images', $image3->getClientOriginalName());

                $product->Name = $name;
                $product->Slug = $slug;
                $product->Price = $price;
                $product->img =  $imageName;
                $product->img1 =  $imageName1;
                $product->img2 =  $imageName2;
                $product->img3 =  $imageName3;
                $product->id_menu= $menu_id;
                $product->Category_id = $category_id;
                $product->Amount = $amount;
                $product->Note = $note;

                $product->save();
                return Redirect::to("product/index");
            }

            return view('product.update_product',$data_view, compact('data'));
        }
        public function delete($id,Request $request)
        {   
            $product = Product::find($id);
            $product->delete();

            return Redirect::to("product/index");
        }


}

