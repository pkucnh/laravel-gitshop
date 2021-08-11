<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Product_images;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{


    public function index()
    {
        // $data = DB::table("categories")->orderBy("id","Desc")->select("*");
         $menu = Menu::all();
         $data = [
            'menu' => $menu,
         ];
        return view('menu.index', $data);
    }

    // Add category
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $name = $request->input("name");
            $anhien = $request->input("anhien");
            $slug = Str::slug($name,"-");

            $menu= new Menu();
 
            $menu->name = $name;
            $menu->anhien = $anhien;
            $menu->slug = $slug;
        
            $menu->save();

            return Redirect::to("menu/index");
        }
        return view('menu.add-menu');
    }
    public function update($id,Request $request)
    {   
        $data_view = array();
        $menu= Menu::find($id);
        $data_view["menu"] = $menu; 
        if($request->isMethod('post')){
            $name = $request->input("name");
            $anhien = $request->file('anhien');
            $slug = Str::slug($name,"-");
        

            $menu->Name = $name;
            $menu->Slug = $slug;
            $menu->anhien = $anhien;
            $menu->save();
            return Redirect::to("menu/index");
        }
        // $data = [
        //     'categories' => $categories,
        // ];
        return view('menu.update-menu',$data_view);
    }
    public function delete($id)
    {   
        $menu = Menu::find($id);
        $menu->delete();

        return Redirect::to("menu/index");
    }
   
}
