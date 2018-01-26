<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table = 'permission';

    public $primaryKey = "id";


    public $guarded = [];

    public $timestamps = false;

//   查找当前用户的角色  多对多
    public function permission()
    {
        return $this->belongsToMany('App\Model\Permission','role_permission','role_id','permission_id');
    }
}
