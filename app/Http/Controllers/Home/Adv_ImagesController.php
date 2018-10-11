<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cookie;

class Adv_ImagesController extends Controller
{
    public function test()
    {
        $list = CommonController::getAdvList();
        return view('Home.Banner.advList');
    }

    public function List()
    {

    }
}
