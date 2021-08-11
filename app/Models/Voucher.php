<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'amount', 'name', 'code', 'conditions','date_start','date_end','status','used'
    ];
    protected $primarykey = 'id';
    protected $table = 'voucher';
}
