<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //让当前的user模型跟blog_user表产生关联
    public $table = 'address';

//    定义关联表的主键
    public $primaryKey = 'id';



    //不允许批量修改的字段
    public $guarded = [];

    public $timestamps = false;

    //通过此动态属性找关联的用户模型
    public function user(){
        $this->belongsTo('App\Model\User','id','uid');
    }
}
