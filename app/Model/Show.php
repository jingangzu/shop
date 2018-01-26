<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    //让当前的show模型和表产生关联
    public $table = 'rotation';
    //定义关联表的主键
    public $primaryKey = 'id';

    //是否自动维护crated_at,updated_at字段
    // public $timestamps = false;

    //允许批量修改的字段
//    public $fillable = ['user_name'];

    //不允许批量修改的字段
    public $guarded = [];

}

