<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $name='admin';
    return view('welcome',['name'=>$name]);
});
/*
////1：实现两种方式访问http://www.1908.com/show 输出“这里是商品详情页”字样
//Route::get('/show','ShopController@index');
//Route::view('/shows','shop.index');
////2：访问http://www.1908.com/show/1 输出“商品Id是：1”字样
////3：访问http://www.1908.com/show/23/裤子 输出“商品Id是：23，关键字是：裤子”字样
//Route::get('/show/{id}/{name?}',function($id,$name=null){
//echo "商品Id是: $id.<br>";
//    if(empty($name)){
//        $name=null;
//    }else{
//        $name='关键字是:'.$name;
//    }
//    echo $name;
//});
//
////4：实现两种方式访问http://www.1908.com/brand/add显示添加界面
//Route::get('/brand/add','ShopController@brand_add');
//Route::view('/brand/adds','shop/brand_add');
////5：实现访问http://www.1908.com/category/add显示添加分类界面，并带过去参数 变量 fid=“服装”;
//Route::view('/category/add','shop.cate_add',['fid'=>'服装']);
*/
/*
Route::get('/goods/{id}',function($id){
echo "商品id是:";
    echo $id;
});


Route::get('/goods/{id}/{name}',function($id,$name){
    echo "商品id是:";
    echo $id;
    echo "名称是：".$name;
})->where('name','[a-z]+');

Route::get('/show','ShopController@brand_add')->name('bb');
*/

//武汉人口统计->middleware('checklogin')
Route::prefix('people')->group(function(){
        Route::get('create','PeopleController@create');
        Route::post('store','PeopleController@store');
        Route::get('/','PeopleController@index');
        Route::get('edit/{id}','PeopleController@edit');
        Route::post('update/{id}','PeopleController@update');
        Route::get('destroy/{id}','PeopleController@destroy');
});
// Route::view('/login','login');
// Route::post('/logindo','LoginController@logindo');



//学生
Route::prefix('study')->group(function(){
    Route::get('/','StudyController@create');
    Route::post('store','StudyController@store');
    Route::get('index','StudyController@index');
    Route::get('destroy/{id}','StudyController@destroy');
    Route::get('edit/{id?}','StudyController@edit');
    Route::post('update/{id}','StudyController@update');
});


//商品品牌
Route::prefix('brand')->group(function(){
    Route::get('create','BrandController@create');
    Route::post('store','BrandController@store');
    Route::get('/','BrandController@index');
    Route::get('destroy/{id}','BrandController@destroy');
    Route::get('edit/{id}','BrandController@edit');
    Route::post('update/{id}','BrandController@update');
});
// ->middleware('checklogin')
Route::prefix('article')->group(function(){
    Route::get('create','ArticleController@create');
    Route::post('store','ArticleController@store');
    Route::get('index','ArticleController@index');
    Route::post('destroy/{id}','ArticleController@destroy');
    Route::get('edit/{id}','ArticleController@edit');
    Route::post('update/{id}','ArticleController@update');
    Route::post('uniqueness','ArticleController@uniqueness');
    //Route::post('edit/uniqueness','ArticleController@uniqueness');
});
//分类
Route::prefix('cate')->middleware('checklogin')->group(function(){
    Route::get('create','CateController@create');
    Route::post('store','CateController@store');
    Route::get('/','CateController@index');
    Route::get('destroy/{id}','CateController@destroy');
    Route::get('edit/{id}','CateController@edit');
    Route::post('update/{id}','CateController@update');
    Route::post('ajaxtest','CateController@ajaxtest');

});
//商品
Route::prefix('shop')->middleware('checklogin')->group(function(){
    Route::get('create','ShopController@create');
    Route::post('store','ShopController@store');
    Route::post('destroy/{id}','ShopController@destroy');
    Route::get('edit/{id}','ShopController@edit');
    Route::post('update/{id}','ShopController@update');
    Route::get('/','ShopController@index');
    Route::post('ajaxtest','ShopController@ajaxtest');
});

    Route::get('/','Index\IndexController@index');
    Route::view('/login','index.login');
// Route::post('/logindo','LoginController@logindo');
