<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Comment_product;
use App\Models\Voucher;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\Product_images;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Mail;

class CommentController extends Controller
{

    // Page index
    public function index()
    {
        $comment = Comment_product::join('users', 'users.id', '=', 'comment_product.User_id')
        ->join('products', 'products.id', '=', 'comment_product.Product_id')
        ->select('comment_product.*', 'users.name','products.Name','products.img')->get();;
        $data = [
            'data' =>  $comment,
        ];
        return view('comment.index', $data);
    }

    public function delete($id)
    {   
        $comment = Comment_product::find($id);
        $comment->delete();

        return Redirect::to("comment/index");
    }
   
   
}
