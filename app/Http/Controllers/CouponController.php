<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Coupons;
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

class CouponController extends Controller
{

    // Page index
    public function index()
    {
        $data = Voucher::all();
        $data = [
            'data' =>  $data,
        ];
        return view('coupon.index', $data);
    }

    // Add coupon
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $coupon = new Voucher();

            $coupon->name = $data['name'];
            $coupon->number = $data['number'];
            $coupon->amount = $data['amount'];
            $coupon->code = $data['code'];
            $coupon->conditions = $data['condition'];
            $coupon->date_start = $data['date_start'];
            $coupon->date_end = $data['date_end'];
            $coupon->status = $data['status'];
            $coupon->save();
        return Redirect::to("coupon/index");
        }
    return view('coupon.add');
    }
    public function update($id,Request $request)
    {   
        // lấy thông tin coupon
        $data = Voucher::all();
        $data_view = array();
        $voucher = Voucher::find($id);
        $data_view["voucher"] = $voucher; 
        if($request->isMethod('post')){
            $data_request = $request->all();

            $voucher->name = $data_request['name'];
            $voucher->number = $data_request['number'];
            $voucher->amount = $data_request['amount'];
            $voucher->code = $data_request['code'];
            // $voucher->conditions = $data_request['condition'];
            $voucher->date_start = $data_request['date_start'];
            $voucher->date_end = $data_request['date_end'];
            $voucher->status = $data_request['status'];
            
            $voucher->save();
            return Redirect::to("coupon/index");
        }
        return view('coupon.update',$data_view, compact('data'));
    }
    public function delete($id,Request $request)
    {   
        $coupon = Voucher::find($id);
        $coupon->delete();

        return Redirect::to("coupon/index");
    }
    public function SendMail($amount,$code,$conditions,$number)
    {
        $customer_vip = User::where('vip',1)->get();
        $coupon = Voucher::where('code',$code)->first();

        $date_start= $coupon->date_start;
		$date_end = $coupon->date_end;
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $title_mail = "Mã khuyến mãi ngày ".''.$now;
        $data = [];

        foreach($customer_vip as $vip){
            $data['email'][] = $vip->email; 
        }
        $coupon = [		
			'date_start' =>$date_start,
			'date_end' =>$date_end,
			'amount' => $amount,
			'code' => $code,
			'conditions' => $conditions,
			'number' => $number
        ];
        \Mail::send('mail.mail_coupon',  ['coupon'=>$coupon], function($message) use ($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);//send this mail with subject
            $message->from($data['email'],$title_mail);//send from this mail
            
        });
        return redirect()->back()->with('message','Gửi mã khuyến mãi thành công');
    }
   
}
