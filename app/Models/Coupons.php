<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'Amount', 'Name', 'Code', 'Conditions','date_start','date_end','status','used'
    ];
    protected $primarykey = 'ID';
    protected $table = 'coupons';
}
