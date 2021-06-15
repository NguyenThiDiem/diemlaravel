<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/vd','App\Http\Controllers\DiemController@viDu');

Route::get('/test','App\Http\Controllers\DiemController@index');

Route:: group(['prefix'=>'test'],function(){
    Route::get('u1',function(){
        echo "Chao 1";
    });
    Route::get('u2',function(){
        echo "Chao 2";
    });
});

Route::get('tinhtong', function () {
    return view('sum');
});

Route::post('tinhtong','App\Http\Controllers\SumController@tinhTong');

//Dien tich hinh tam giac vaf tu giac
Route::get('/areaOfShape','App\Http\Controllers\AreaOfShapeController@computerArea');
Route::post('/areaOfShape','App\Http\Controllers\AreaOfShapeController@computerArea');

//Tao form va xuat du lieu ra form
Route::get('/form','App\Http\Controllers\signupController@index');
Route::post('form','App\Http\Controllers\signupController@displayInfor');

//
Route::get('/formArray','App\Http\Controllers\WatchController@dataWatch');
Route::post('formArray','App\Http\Controllers\WatchController@dataWatch');


// Route::get ('index',[
//         'as'=>'trang-chu',
//         'user'=>'PageController@getIndex'
// ]);
//
//Route::get('/index','App\Http\Controllers\PageController@getIndex');
//cat layout

//--------------------------------------------------------

Route::get('/',function(){
    return view('welcome');
});
    

Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses' =>'App\Http\Controllers\PageController@getLoaiSp'
]);
Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chitietsanpham',
    'uses' =>'App\Http\Controllers\PageController@getChitiet'
]);


Route::get('index',[
    'as'=>'trang-chu',
    'uses' =>'App\Http\Controllers\PageController@getIndex'
]);
Route::get('gioi_thieu',[
    'as'=>'about',
    'uses'=>'App\Http\Controllers\PageController@getAbout'
]);
Route::get('lien_he',[
    'as'=>'lienhe',
    'uses'=>'App\Http\Controllers\PageController@getLienhe'
]);

Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses' =>'App\Http\Controllers\PageController@getLoaiSp'
]);
Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chitietsanpham',
    'uses' =>'App\Http\Controllers\PageController@getChitiet'
]);

//---------------Admin-----------------
Route::get('admin',
        [    'as'=>'index-admin',
            'uses'=>'App\Http\Controllers\PageController@getIndexAdmin'
         ] );
Route::get('admin-add-form',
    [
        'as'=>'getadminadd',
        'uses'=>'App\Http\Controllers\PageController@getAdminAdd'
    ]
    );
    Route::post('admin-add',
    [
        'as'=>'adminadd',
        'uses'=>'App\Http\Controllers\PageController@postAdminAdd'
    ]
    );
    // --------------------------------------
    Route::get('admin-edit-form/{id}',
        ['as'=>'getadminedit',
            'uses'=>'App\Http\Controllers\PageController@getAdminEdit'
        
        ]    
);
Route::post('admin-edit',
    [
        'as'=>'adminedit',
        'uses'=>'App\Http\Controllers\PageController@postAdminEdit'
    ]
    );

    Route::post('admin-delete/{id}',
    [
        'as'=>'admindelete',
        'uses'=>'App\Http\Controllers\PageController@postAdminDelete'
    ]
    );

    //------Giỏ hàng-------
    Route::get('add-to-cart/{id}',[				
        'as'=>'themgiohang',			
        'uses'=>'App\Http\Controllers\PageController@getAddtoCart'			
        ]);		
        
        Route::get('del-cart/{id}',
        [
            'as'=>'xoagiohang',
            'uses'=>'App\Http\Controllers\PageController@getDelItemCart'
        ]
        );

        //--------------Thanh toán---------
        Route::get('dat-hang',
            [
                'as'=>'dathang',
                'uses'=>'App\Http\Controllers\PageController@getCheckout'
            ]);
       
            Route::post('dat-hang',
            [
                'as'=>'dathang',
                'uses'=>'App\Http\Controllers\PageController@postCheckout'
            ]);
    
   