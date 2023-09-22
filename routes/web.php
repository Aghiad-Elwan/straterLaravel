<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\SecondController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\SoicalController;
use App\Http\Controllers\Front\CrudController;
//use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//مناداة ال الفيو من خلال التابع راوت
Route::get('/index', function () {
    return view('index');
});

//مناداة ال الفيو من خلال الكنترولر
Route::get('/',[UserController::class,'getIndex']);

Route::get('/test1',function(){
    return "Hi Iam Aghiad";
});
//route pramater
Route::get('/test2/{id}',function($id){
    return "HI {$id}";
});

Route::get('/test3/{id?}',function(){
    return "optinal patamters";

});
//route name
Route::get('/show-num/{id}',function($id){
    return  $id;
})->name('num');

Route::get('/show-string',function(){
    return 'Hi';
})->name('string');

Route::get('/admin',function(){
    return 'welecome in page Admin';
});

//nameSpace

/*(Laravel 6) Route::namespace('Front')->group(function(){
    Route::get('user','UserController@showUserName');
});*/

Route::get('/user', [UserController::class, 'showUserName']);




Route::get('login',function(){
    return 'Must be login';
})->name('login');


//prefix
Route::group(['prefix'=>'users'],function(){
    Route::get('/a',function(){
        return 'welecome in page users';
    });

});
//middleware
Route::group(['prefix'=>'middleware','middleware'=>'auth'],function(){
   Route::get('/',function(){
       return 'defined to Access';
   });
});

Route::group(['prefix'=>'middlewareTest'],function(){
    Route::get('/',function(){
        return 'defined to Access';
    })->middleware('auth');
 });

Route::get('/second0',[SecondController::class,'secondPage0'])->middleware('auth');
Route::get('/second1',[SecondController::class,'secondPage1']);
Route::get('/second2',[SecondController::class,'secondPage2']);
Route::get('/second3',[SecondController::class,'secondPage3']);

//Route Resource
Route::resource('news',NewsController::class);



Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/redirect/{service}}',[SoicalController::class,'redirect']);

Route::get('/callback/{service}}',[SoicalController::class,'callback']);


//Offers
Route::get('/fillable',[CrudController::class,'getOffers']);

/*Route::group(['prefix'=>'offers'],function (){
    Route::get('store',[CrudController::class,'store']);
});*/


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {
    Route::group(['prefix' => 'offers'], function () {
        Route::get('create', [CrudController::class, 'create']);
        Route::post('store', [CrudController::class, 'store'])->name('offers.store');
    });
});


