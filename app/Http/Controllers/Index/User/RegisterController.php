<?php

namespace App\Http\Controllers\Index\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //注册
    public function register()
    {
    	return view('index.user.register');
    	// return 1111;
    }
}
