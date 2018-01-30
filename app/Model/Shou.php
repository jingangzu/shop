<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shou extends Model
{
    //
    public $table='user_goods';

    //是否自动维护crated_at,updated_at字段
    public $timestamps = false;
     public $guarded = [];

     public function goods()
     {
     	return $this->belongsTo('App\Model\Goods','goods_id','id');
     }
}
