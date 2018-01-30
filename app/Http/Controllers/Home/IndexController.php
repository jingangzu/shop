<?php

namespace App\Http\Controllers\Home;

use App\Model\Cate;
use App\Model\Config;

use App\Model\Goods;
use App\Model\Show;
use App\Model\Advertisement;
use App\Model\Recommend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

//     //首页
    public function index()
    {
        $config = \DB::table('config')->where('conf_id','44')->first();
        $config = $config->field_value;
        if($config == 0 ){
            return view('home/weihu');
        }

      
    	$cate = new Cate();
        $cates = $cate->getCate();

        $goods = \DB::table('goods')->get();
    	
        //轮播图4张 value  pluck
        $show = \DB::table('rotation')->pluck('img');
// dd($show);
        //轮播图4张 value  pluck
        $rec = \DB::table('recommends')->pluck('img');
        //轮播图4张 value  pluck
        $adv = \DB::table('advertisement')->get();
        //显示主页
        return view('home/index',['show' => $show,'rec' => $rec,'adv' => $adv,'cates' => $cates,'goods' => $goods]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
