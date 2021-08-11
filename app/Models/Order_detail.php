<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'order_code','product_id','name','price','sales_quanlity','coupon','fee'
    ];
    protected $primarykey = 'id';
    protected $table = 'order_detail';//
    public function voucher(){
        return $this->belongsTo('App\Models\voucher', 'order_code');
    }
}
