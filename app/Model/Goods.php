<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //表名
    public $table='goods';
    //主键默认id
    public $primaryKey = 'id';
    //允许批量修改
    // public $fillable=[];
    //不允许批量修改
    public $guarded =[];
    //是否自动添加created_at,update_at
    public $timestamps = false;

   public function goodstags()
    {
        return $this->hasOne('App\Model\goodstags', 'cateid', 'cid');
    }

}
