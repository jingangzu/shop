<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //

    public $table = "orders";
     public $primaryKey = 'id';
    public $timestamps = false;


     

    public function oruser(){
        return $this->belongsTo('App\Model\User', 'uid', 'id');
    }

    public function oruserinfo(){
        return $this->hasOne('App\Model\UserInfo', 'uid', 'id');
    }

    public function orgoods(){
        return $this->belongsTo('App\Model\Goods', 'gid', 'id');
    }

    public function ordersinfo(){
        return $this->hasOne('App\Model\ordersinfo', 'o_code', 'o_code');
    }
public function oraddress(){
        return $this->hasOne('App\Model\Address', 'o_addr', 'id');
    }
     //查找当商品的订单  多对多
    public function good_orders()
    {
        return $this->belongsToMany('App\Model\orders','order_goods','order_id','goods_id');
    }
  

}
