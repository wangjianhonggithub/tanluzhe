<?php

namespace App\Http\Controllers\Home;

use App\Model\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     * 展示所有的可选的轮播图广告位
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = new Banner();
        $list = $banner->get();
        return view('/Home/Carousel/index',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('/Home/Carousel/createAuc',['id'=>$request->get('id')]);
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
/*        switch ($id)
        {
        case 'createAuc': //轮播图竞价页面，表单！提交竞价信息
            return view('/Home/Carousel/createAuc');
        break;
        case 'createAuc';
            return view('');
        break;
        default:
            echo "<scirpt> alert('没有跳转好对应的界面'); </scirpt>";
        }*/
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
        echo  111;
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
