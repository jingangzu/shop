<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
    public $table = 'config';
    public $primaryKey = "conf_id";
    public $guarded = [];
    public $timestaps = false;

    // public function getConfig()
    // {
    // 	//获取所有分类数据
    // 	$conf = $this::orderBy('conf_order','asc')->get();

    // 	return $this->Config($conf);
    // }
}
