<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //让当前的user模型跟blog_user表产生关联
    public $table = 'user_admins';

//    定义关联表的主键
    public $primaryKey = 'id';


    //是否自动维护crated_at,updated_at字段
//    public $timestamps = false;


    //允许批量修改的字段
//    public $fillable = ['user_name'];

    //不允许批量修改的字段
    public $guarded = [];

    //用户模型跟用户详情模型关联的动态属性，通过这个函数能找到跟当前模型关联的用户详情模型
    //找关联的用户详情模型
    public function userInfo()
    {
        return $this->hasOne('App\Model\UserInfo', 'id', 'id');
    }



    //找到关联的用户地址模型  一对多
    public function address(){

        return $this->hasMany('App\Model\Address', 'id', 'id');
    }


    //查找当前用户的角色  多对多
    public function roles()
    {
        return $this->belongsToMany('App\Model\Role','user_role','id','role_id');
    }


}
