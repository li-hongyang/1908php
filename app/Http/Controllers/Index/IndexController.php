<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{	
	//前台首页
    public function index(){

    	return view('index.index');
    }
}
