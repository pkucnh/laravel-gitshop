<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Product_images;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{


    public function index()
    {
        // $data = DB::table("categories")->orderBy("id","Desc")->select("*");
         $category = Category::join('menu', 'menu.id', '=', 'categories.id_menu')->select('categories.*','menu.name')->get();
         $data = [
            'category' => $category,
         ];
        return view('category.index', $data);
    }

    // Add category
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $name = $request->input("name");
            $menu_id = $request->input("menu_id");
            $note = $request->input("note");
            $image = $request->file('img');
            $slug = Str::slug($name,"-");

            // upload image
            $imageName = $image->getClientOriginalName();                                 
            $storedPath = $image->move('category/images', $image->getClientOriginalName());
            $product = new Category();
 
            $product->Name = $name;
            $product->id_menu = $menu_id;
            $product->Slug = $slug;
            $product->img =  $imageName;
            $product->Note = $note;

            $product->save();

            return Redirect::to("category/index");
        }
        return view('category.add-category');
    }
    public function update($id,Request $request)
    {   
        $data_view = array();
        $category = Category::find($id);
        $data_view["categories"] = $category; 
        if($request->isMethod('post')){
            $name = $request->input("name");
            $image = $request->file('img');
            $menu_id = $request->input("menu_id");
            $note = $request->input("note");
            $slug = Str::slug($name,"-");
            $imageName = $image->getClientOriginalName();
            $storedPath = $image->move('category/images', $image->getClientOriginalName());

            $category->Name = $name;
            $category->Slug = $slug;
            $category->id_menu = $menu_id;
            $category->img =  $imageName;
            $category->Note = $note;

            $category->save();
            return Redirect::to("category/index");
        }
  
        return view('category.update-category',$data_view);
    }

    public function delete($id)
    {   
        $category = Category::find($id);
        $category->delete();

        return Redirect::to("category/index");
    }
   
}
