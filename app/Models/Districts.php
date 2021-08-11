<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'Name', 'Type', 'City_id'
    ];
    protected $primarykey = 'ID';
    protected $table = 'districts';
}
