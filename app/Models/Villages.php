<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Villages extends Model
{
    protected $table = 'Villages';
    // protected $table = 'villages';

    protected $primarykey = 'ID';
    
    // protected $primarykey = 'id';
    // default se lay id nen ko can gan $primaryKey database ko can viet theo kieu lac da ha sp
    // Khong,
    // Database se viet kieu snake
    // user_role
    // user_id
    // id
    // username or user_name
    // district_id
    // ok nha
     // nay no dinh > nen ko chay thag valliga ph ko sp
    //  Yes 
    // có thẻ dd gettype($data['ma_id']) de kieu tra type 
    // ok sp hieu r 
    // ok off day thna
    protected $fillable = [
        'ID','Name','Type','District_id'
    ];
    public $timestamps = false;
}
