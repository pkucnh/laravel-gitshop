<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Coupons;
use App\Models\Voucher;
use App\Models\Villages;
use App\Models\Districts;
use App\Models\Citys;
use App\Models\User;
use App\Models\Feeships;
use App\Models\Orders;
use App\Models\Shipping;
use App\Models\Order_detail;
use Illuminate\Support\Facades\Storage;
use App\Models\Product_images;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;


class CartController extends Controller

{
    public function CalculateFee(Request $request)
    {
        $data = $request->all();
        if($data['city_id']){
            $feeship = Feeships::where('City_id',$data['city_id'])->where('District_id',$data['district_id'])->where('Village_id',$data['village_id'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship > 0){
                    foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->Fee_feeship);
                        Session::save();
                    }
                }else{
                    Session::put('fee','15000');
                    Session::save();
                }
            }

       
        }
    }
    public function DeleteFee(Request $request)
    {
        Session::forget('fee');
        return Redirect()->back();
    }
    public function SelectDeliveryHome(Request $request)
    {
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $selectdistrict = Districts::where('City_id',$data['ma_id'])->orderby('ID','ASC')->get();
                $output .= '<option>--- District ---</option>';
                foreach($selectdistrict as $key => $district){
                    // $output .= '<option value=">'.$district->ID.'">'.$district->Name.'</option>';'
                    // Viet cach duoi cho de truyen bien
                    $output .= "<option value='$district->ID'>$district->Name</option>";
                }
            }else{
                
                $selectvillage = Villages::where('District_id', $data['ma_id'])->orderBy('ID', 'asc')->get();
                $output .= '<option>--- Village ---</option>';
                foreach($selectvillage as $key => $village){
                    // $output .= '<option value=">'.$village->ID.'">'.$village->Name.'</option>';
                    $output .= "<option value='$village->ID'>$village->Name</option>";
                }
            }
            return $output;
        }
    }
    public function ShowCart(Request $request)
    {
        $url_canonical = $request->url();
        $citys = Citys::orderby('ID','ASC')->get();
        return view('cart.show-cart')->with(compact('citys'));
    }

    public function AddCart(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id'] == $data['cart_product_id']){
                     $is_avaiable++;
                    $cart[$key] = [
                    'session_id' => $val['session_id'],
                    'product_name' => $val['product_name'],
                    'product_id' => $val['product_id'],
                    'product_image' => $val['product_image'],
                    'product_price' => $val['product_price'],
                    'product_amount' => $val['product_amount']+ $data['cart_product_amount'],
                    ];
                    Session::put('cart',$cart);
                }
            }
            if($is_avaiable == 0){
                $cart[] = [
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'], 
                    'product_name' => $data['cart_product_name'], 
                    'product_image' => $data['cart_product_image'], 
                    'product_price' => $data['cart_product_price'], 
                    'product_amount' => $data['cart_product_amount'], 
                ];
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = [
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'], 
                'product_name' => $data['cart_product_name'], 
                'product_image' => $data['cart_product_image'], 
                'product_price' => $data['cart_product_price'], 
                'product_amount' => $data['cart_product_amount'], 
            ];
            Session::put('cart',$cart);
        }
        Session::save();
    }

    public function UpdateCart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id']==$key){
                       $cart[$session]['product_amount'] = $qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Cập nhật giỏ hàng thành công' );
        }
    }

    public function DeleteCart($session_id)
    {
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
        }
        return redirect()->back()->with('mass','Xóa giỏ hàng thành công' );
    }

    //Coupon
    public function CheckCoupon(Request $request)
    {
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $data = $request->all();
        if(Session('customer_id')){
            $coupon = Voucher::where('code',$data['coupon'])->where('status',0)->where('date_end','>',$today)->where('amount','>',0)->where('used','LIKE','%'.Session::get('customer_id').'%')->first();
                if($coupon){
                    return redirect()->back()->with('cous','Mã giảm giá đã được sử dụng hoặc hết hạn');
                }else{
                    $coupon_login = Voucher::where('code',$data['coupon'])->where('amount','>',0)->where('status',1)->where('date_end','>=',$today)->first();
                    if($coupon_login){
                        $count_coupon = $coupon_login->count();
                        if($count_coupon>0){
                            $coupon_session = Session::get('coupon');
                            if($coupon_session==true){
                                $id_avaiable = 0;
                                if($id_avaiable==0){
                                    $cou[] = [
                                        'coupon_code' => $coupon_login->code,
                                        'coupon_number' => $coupon_login->number,
                                        'coupon_condition' => $coupon_login->conditions,
                                    ];
                                    Session::put('coupon',$cou);    
                                }
                            }else{
                                $cou[] = [
                                    'coupon_code' => $coupon_login->code,
                                    'coupon_number' => $coupon_login->number,
                                    'coupon_condition' => $coupon_login->conditions,
                                ];
                                Session::put('coupon',$cou);
                            }
                            Session::save();
                            return Redirect()->back()->with('cou','Áp dụng mã giảm giá thành công');
                        }
                    }else{
                        return Redirect()->back()->with('cous','Mã giảm giá đã được sử dụng hoặc hết hạn');
                    }
                }
                // chưa đăng nhâp
        }else{
            $coupon = Voucher::where('code',$data['coupon'])->where('status',1)->where('date_end','>',$today)->first();
            if($coupon){
                $count_coupon = $coupon->count();
                if($count_coupon>0){
                    $coupon_session = Session::get('coupon');
                    if($coupon_session==true){
                        $id_avaiable = 0;
                        if($id_avaiable==0){
                            $cou[] = [
                                'coupon_code' => $coupon->code,
                                'coupon_number' => $coupon->number,
                                'coupon_condition' => $coupon->conditions,
                            ];
                            Session::put('coupon',$cou);    
                        }
                    }else{
                        $cou[] = [
                            'coupon_code' => $coupon->code,
                            'coupon_number' => $coupon->number,
                            'coupon_condition' => $coupon->conditions,
                        ];
                        Session::put('coupon',$cou);
                    }
                    Session::save();
                    return Redirect()->back()->with('cou','Discount code successful');
                }
            }else{
                return Redirect()->back()->with('cous','Discount code has been used or expired');
            }
        }

    }
    //Delete Coupon
    public function DeleteCoupon(Request $request)
    {
        Session::forget('coupon');
        return Redirect()->back();
    }
    //Order
    
    public function ConfirmOrder(Request $request)
    {
        $data = $request->all();
        // get coupon
        if($data['order_coupon']!='Không có mã giảm giá'){
            $coupon = Voucher::where('code',$data['order_coupon'])->first();
            $coupon->used = $coupon->used.','.Session::get('customer_id');
            $coupon->Amount = $coupon->amount - 1;
            $coupon_mail = $coupon->code;
            $coupon->save();
        }
        // else{
        //     $coupon_mail = 'không có sử dụng';
        // }

        $shipping = new Shipping();
        $shipping->name = $data['name'];
        $shipping->phone = $data['phone'];
        $shipping->email = $data['email'];
        $shipping->adress = $data['adress'];
        $shipping->note = $data['note'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
  
        $shipping_id = $shipping->id;
        $order_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Orders; 
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->status= 0;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at= now();
        $order->order_code = $order_code;
        $order->save();

        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart){
                $order_detail = new Order_detail;

                $order_detail->order_code = $order_code;
                $order_detail->product_id = $cart['product_id'];
                $order_detail->name = $cart['product_name'];
                $order_detail->price = $cart['product_price'];
                $order_detail->sales_quanlity = $cart['product_amount'];
                $order_detail->fee= $data['order_feeship'];
                $order_detail->coupon = $data['order_coupon'];
                $order_detail->save();
            }
        } 
        //Send mail confirm
        // $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        // $title_mail = "Đơn hàng xác nhận ngày".''.$now;

        // $customer = User::find(Session::get('customer_id'));
        // $data['email'][] = $customer->email;

        // if(Session::get('cart')==true){
        //     foreach(Session::get('cart') as $key => $cart_mail){
        //         $cart_array[] = [
        //             'product_name' => $cart_mail['product_name'],
        //             'product_price' => $cart_mail['product_price'],
        //             'product_amount' => $cart_mail['product_amount']
        //         ];
        //     }
        // }
   
        // if(Session::get('fee')==true){
        //     $fee = Session::get('fee').'k';
        // }else{
        //     $fee = '25k';
        // }
        // $shipping_array = [
        //     'fee' =>  $fee,
        //     'customer_name' => $customer->name,
        //     'shipping_name'=> $data['name'],
        //     'shipping_phone' => $data['phone'],
        //     'shipping_email' => $data['email'],
        //     'shipping_address' =>  $data['adress'],
        //     'shipping_note' => $data['note'],
        //     'shipping_method' => $data['shipping_method']
        // ];
        // $ordercode_mail = [
        //     'coupon_code'=> $coupon_mail,
        //     'order_code' => $order_code,
        // ];

        // \Mail::send('mail.mail_order',  ['cart_array'=>$cart_array, 'shipping_array'=>$shipping_array ,'code'=>$ordercode_mail] , function($message) use ($title_mail,$data){
        //     $message->to($data['email'])->subject($title_mail);
        //     $message->from($data['email'],$title_mail);
        // });

        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }

    //History
    public function History(Request $request)
    {
        if(!Session::get('customer_id')){
            return redirect('dang-nhap')->with('message', 'Vui đăng nhập để xem lịch sử đơn hàng');
        }else{
            $get_order = Orders::where('customer_id',Session::get('customer_id'))->orderby('id','DESC')->paginate(5);
            $data = [
                'getorder' => $get_order,
            ];

            return view('history.history',$data);
        }
    }
    //Historu-order
    public function ViewHistoryOrder(Request $request, $order_code)
    {
        if(!Session::get('customer_id')){
            return redirect('dang-nhap')->with('message', 'Vui đăng nhập để xem lịch sử đơn hàng');
        }else{
            $order_details = Order_detail::where('order_code',$order_code)->join('products', 'products.id', '=', 'order_detail.product_id')->select('order_detail.*','products.img')->get();
            $getorder = Orders::where('order_code',$order_code)->get();
            foreach($getorder as $key => $ord){
                $customer_id = $ord->customer_id;
                $shipping_id = $ord->shipping_id;
                $order_status = $ord->status;
            }

            $customer = User::where('id',$customer_id)->first();
            $shipping = Shipping::where('id',$shipping_id)->first();
    
            $order_details_product = Order_detail::where('order_code', $order_code)->get();

            foreach($order_details_product as $key => $order_d){
    
                $product_coupon = $order_d->coupon;
                $product_id = $order_d->product_id;
            }
            if($product_coupon != 'Không có mã giảm giá'){
                $coupon = Voucher::where('code',$product_coupon)->first();
                $coupon_condition = $coupon->conditions;
                $coupon_number = $coupon->number;
            }else{
                $coupon_condition = 2;
                $coupon_number = 0;
            }

            $data = [
                'order_details' =>  $order_details,
                'customer' => $customer,
                'shipping' => $shipping,
                'coupon_condition' => $coupon_condition,
                'coupon_number' => $coupon_number,
                'getorder' => $getorder,
                'order_status' => $order_status,
                'order_code' =>$order_code
            ];
            return view('history.view_history',$data); 
            // return view('history.view_history')->with('order_details',$order_details)->with('customer',$customer)->with('shipping',$shipping)->with('coupon_condition',$coupon_condition)->with('coupon_number',$coupon_number)->with('getorder',$getorder)->with('order_status',$order_status)->with('order_code',$order_code); 
        }
    }

}
