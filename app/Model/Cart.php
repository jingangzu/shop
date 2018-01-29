<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public $table = 'shop_cart';
    public $primaryKey = "id";
    public $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return   $this->belongsTo('App\Model\User','uid','id');
    }
     
    public function goods()
    {
        return  $this->belongsTo('App\Model\Goods','gid','id');
    }
}
