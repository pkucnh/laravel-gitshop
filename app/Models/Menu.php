<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'anhien', 'slug'
    ];
    protected $primarykey = 'id';
    protected $table = 'menu';
}
