<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $table = 'category';
    public $primaryKey = 'cate_id';
    public $guarded = [];
    public $timestaps = false;

    public function getCate()
    {
    	//获取所有分类数据
    	$cates = $this::orderBy('cate_order','asc')->get();
        
    	return $this->Cate($cates);
    }

    public function Cate($category)
    {
    	//1.定义一个空数组，存放格式化后的数据
    	$arr = [];
    	//2.对分类数据进行排序
    	foreach($category as $k=>$v)
    	{
    		//获取一级类
    		if($v->cate_pid == 0){
    			$v['catenames'] = $v['cate_name'];
    			$arr[]=$v;
               

    			//获取二级类
    			foreach($category as $m=>$n)
    			{
    				if($n->cate_pid == $v->cate_id){
    					$n['catenames'] = '|----'.$n['cate_name'];
    					$arr[]=$n;
                        $v->flag=true;
    				}
    			}
    		}
    	}

    	return  $arr;
    }

}
