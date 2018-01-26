<?php

namespace App\Http\Controllers\Home;
use App\Model\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //首页
    public function index()
    {
    	$cate = new Cate();
	$cates = $cate->getCate();
    	return view('home.index',compact('cates'));
    }
}
