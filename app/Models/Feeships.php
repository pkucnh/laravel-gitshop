<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feeships extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'City_id', 'District_id', 'Village_id', 'Fee_feeship'
    ];
    protected $primarykey = 'ID';
    protected $table = 'feeships';
    public function city(){
        return $this->belongsTo('App\Models\Citys', 'City_id');
    }
    public function district(){
        return $this->belongsTo('App\Models\Districts', 'District_id');
    }
    public function village(){
        return $this->belongsTo('App\Models\Villages', 'Village_id');
    }
}
