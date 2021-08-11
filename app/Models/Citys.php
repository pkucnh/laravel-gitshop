<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'Name', 'Type'
    ];
    protected $primarykey = 'ID';
    protected $table = 'citys';
}
