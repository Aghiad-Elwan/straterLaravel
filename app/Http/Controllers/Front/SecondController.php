<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['secondPage2','secondPage3']);
    }

    public function secondPage0(){
        return 'Second Page0';
    }

    public function secondPage1(){
        return 'Second Page1';
    }

    public function secondPage2(){
        return 'Second Page2';
    }

    public function secondPage3(){
        return 'Second Page3';
    }
}
