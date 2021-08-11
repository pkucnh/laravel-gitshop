<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'email','password','name','phone'
    ];

    protected $primaryKey = 'id';
    protected $table = 'admin';

}