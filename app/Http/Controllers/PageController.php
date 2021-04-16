<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends FrontController
{
    public function login(){
        return view('pages.login',$this->data);
    }
    public function register(){
        return view('pages.register',$this->data);
    }
}
