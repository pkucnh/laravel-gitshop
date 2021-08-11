<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Citys;
use App\Models\Villages;
use App\Models\Districts;
use App\Models\Voucher;
use App\Models\User;
use App\Models\Category;
use App\Models\Feeships;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\Product_images;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Support\Facades\Session;

class FeeshipController extends Controller
{

    // Page index
    public function index()
    {
        $feeship = Feeships::all();

        $data = [
            'feeship' => $feeship,
        ];
        
        return view('feeship.index',$data);
    }

    public function AddFeeship(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            $feeship = new Feeships();
            $feeship->City_id = $data['city']; 
            $feeship->District_id = $data['district']; 
            $feeship->Village_id = $data['village']; 
            $feeship->Fee_feeship = $data['fee_ship']; 

            $feeship->save();
            return Redirect::to("feeship/index");
           
        }
        $city = Citys::orderby('ID','ASC')->get();
        $data = [
            'city' => $city,
        ];
        return view('feeship.add',$data);
    }
    // Add coupon
    public function add(Request $request)
    {
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $selectdistrict = Districts::where('City_id',$data['ma_id'])->orderby('ID','ASC')->get();
                $output .= '<option>-- Chọn quận huyện --</option>';
                foreach($selectdistrict as $key => $district){

                    $output .= "<option value='$district->ID'>$district->Name</option>";
                }
            }else{
                
                $selectvillage = Villages::where('District_id', $data['ma_id'])->orderBy('ID', 'asc')->get();
                $output .= '<option>-- Chọn xã phường --</option>';
                foreach($selectvillage as $key => $village){
   
                    $output .= "<option value='$village->ID'>$village->Name</option>";
                }
            }
            return $output;
        }
                

    }
    public function update($id,Request $request)
    {
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $selectdistrict = Districts::where('City_id',$data['ma_id'])->orderby('ID','ASC')->get();
                $output .= '<option>-- Chọn quận huyện --</option>';
                foreach($selectdistrict as $key => $district){

                    $output .= "<option value='$district->ID'>$district->Name</option>";
                }
            }else{
                
                $selectvillage = Villages::where('District_id', $data['ma_id'])->orderBy('ID', 'asc')->get();
                $output .= '<option>-- Chọn xã phường --</option>';
                foreach($selectvillage as $key => $village){
   
                    $output .= "<option value='$village->ID'>$village->Name</option>";
                }
            }
            return $output;
        }
                

    }
    public function UpdateFeeship($id,Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $fee = Districts::where('City_id',$data['ma_id'])->orderby('ID','ASC')->get();
            $data = $request->all();

            $feeship = new Feeships();
            $feeship->City_id = $data['city']; 
            $feeship->District_id = $data['district']; 
            $feeship->Village_id = $data['village']; 
            $feeship->Fee_feeship = $data['fee_ship']; 

            $feeship->save();
            return Redirect::to("feeship/index");
           
        }
        $city = Citys::orderby('ID','ASC')->get();
        $data = [
            'city' => $city,
        ];
        return view('feeship.update',$data);
    }


    public function delete($ID)
    {   
            $feeship =  Feeships::find($ID);
            $feeship->delete();

            return Redirect::to("feeship/index");
        
    }
    
   
}
