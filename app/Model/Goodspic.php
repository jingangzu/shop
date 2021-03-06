<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goodspic extends Model
{
      //表名
    public $table='goods_picture';
    //主键默认id
    public $primaryKey = 'id';
    //允许批量修改
    // public $fillable=[];
    //不允许批量修改
    public $guarded =[];
    //是否自动添加created_at,update_at
    public $timestamps = false;

    public function goods()
    {
        return $this->belongsTo('App\Model\Goods','gid','id');
    }

}
