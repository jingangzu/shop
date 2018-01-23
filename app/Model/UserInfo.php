<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //让当前的user模型跟blog_user表产生关联
    public $table = 'userinfo';

//    定义关联表的主键
    public $primaryKey = 'uid';


    //是否自动维护crated_at,updated_at字段
    public $timestamps = false;

    //不允许批量修改的字段
    public $guarded = [];


    //找关联的用户模型
    public function user()
    {
        return $this->belongsTo('App\Model\User','uid','id');
    }
}
