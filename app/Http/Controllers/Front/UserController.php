<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    


    public function showUserName(){
        return 'Aghiad Elwan';
    }

    public function getIndex(){
        //$data=['Aghiad','Sam','Heshame']
        $obj=new \stdClass;
        $obj->id=1;
        $obj->name='Aghiad';
        
        //return view('welcome',$data);
        return view('welcome',compact('obj'));
    }
}
