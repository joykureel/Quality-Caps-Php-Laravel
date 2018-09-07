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
    return view('home');
});
Route::get('/add-to-cart/{id}',[
     'uses'=>'MemberCapsController@AddToCart',
     'as'=>'membercaps.addtocart'
]);
Route::get('/remove/{id}',[
    'uses'=>'MemberCapsController@remove',
    'as'=>'membercaps.remove'
]);
Auth::routes();
Route::group(['middleware' => 'Admin'], function() {
    // uses 'admin' middleware plus all middleware from $middlewareGroups['web']
    Route::resource('caps','CapsController'); 
    Route::resource('category','CategorysController');
    Route::resource('supplier','SuppliersController');
    Route::get('/users','UsersController@index');
    Route::get('/orders', 'OrdersController@index');
    Route::get('/users/{id}',[
        'uses'=>'UsersController@status',
        'as'=>'users'
    ]);
}); 
Route::group(['middleware' => 'users'], function() {
Route::get('/checkout', 'OrdersController@checkout');
Route::get('/memberindex', 'OrdersController@memberindex');
Route::get('/confirmation', 'OrdersController@confirmation');
Route::post('/orders','OrdersController@store');
}); 
Route::get('/membercaps',[
    'uses'=>'MemberCapsController@index',
    'as'=>'membercaps']);
    Route::get('/shoppingcart',[
        'uses'=>'MemberCapsController@getCart',
        'as'=>'shoppingcart'
    ]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/membercaps/?{searchKey},MemberCapsController@search');
Route::get('/orders/{id}',[
    'uses'=>'OrdersController@update',
    'as'=>'orders'
]);


