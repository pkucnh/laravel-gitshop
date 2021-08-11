<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name','phone','email','adress','note','shipping_method'
    ];
    protected $primarykey = 'id';
    protected $table = 'shipping';
}
