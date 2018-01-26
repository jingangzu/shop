<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ordersinfo extends Model
{
    //
     public $table = "ordersinfo";
    public $timestamps = false;
    public function orgoods(){
        return $this->hasMany('App\Model\Goods', 'goods_name', 'gname');
    }
    public function user(){
        return $this->hasOne('App\Model\User', 'name', 'username');
    }
    public function oraddress(){
        return $this->hasOne('App\Model\Address', 'id', 'o_addr');
    }
    
    public function shop(){
        return $this->hasOne('App\Model\shop','id', 'sid');
    }

    public function order(){
        return $this->hasOne('App\Model\orders','id','id');
    }
}
