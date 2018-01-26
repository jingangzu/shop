<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Friend_link extends Model
{
     //表名
    public $table='friend_link';
    //主键默认id
    public $primaryKey = 'id';
    //允许批量修改
    // public $fillable=[];
    //不允许批量修改
    public $guarded =[];
    //是否自动添加created_at,update_at
    // public $timestamps = false;



}
