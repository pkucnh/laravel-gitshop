<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Order_detail;
use App\Models\Orders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index()
    {

        $get_order = Orders::all();
        $data = [
            'order' => $get_order,
        ];
        return view('order.index',$data);
    }
    public function update($id,Request $request)
    {   
        $order = Orders::find($id);
        if($order->status<4){
            $order->status = $order->status + 1;
        }
        $order->save();
        return Redirect::to("order/index");
    }
    public function delete($id,Request $request)
    {   
        $order = Orders::find($id);
        $order->status = 5;
        $order->save();

        return Redirect::to("order/index");
    }
}
