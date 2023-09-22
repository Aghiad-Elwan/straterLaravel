<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vendor\laravel\socialite\src\Facades\Socialite;

class SoicalController extends Controller
{
    public function redirect($service){
        return Socialite::driver($service)->redirect();
    }
    
    public function callback($service){
        return $user=Socialite::with($service)->user();
    }
}
