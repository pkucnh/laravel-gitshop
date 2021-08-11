<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment_product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'Content', 'Date', 'Product_id', 'User_id'
    ];
    protected $primarykey = 'id';
    protected $table = 'comment_product';
}
