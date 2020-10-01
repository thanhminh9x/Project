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

Route::get('/', [
    'as' => 'trang-chu',
    'uses' => 'PageController@getIndex'
]);
Route::get('loai-san-pham/{type}', [
    'as' => 'loaisanpham',
    'uses' => 'PageController@getLoaiSp'
]);
Route::get('chi-tiet-san-pham/{id}', [
    'as' => 'chitietsanpham',
    'uses' => 'PageController@getChitiet'
]);
Route::get('lien-he', [
    'as' => 'lienhe',
    'uses' => 'PageController@getLienhe'
]);
Route::get('gioi-thieu', [
    'as' => 'gioithieu',
    'uses' => 'PageController@getGioithieu'
]);
Route::get('add-to-cart/{id}', [
    'as' => 'themgiohang',
    'uses' => 'PageController@getAddtoCart'
]);
Route::get('del-cart/{id}', [
    'as' => 'xoagiohang',
    'uses' => 'PageController@getDelItemCart'
]);
Route::get('dat-hang', [
    'as' => 'dathang',
    'uses' => 'PageController@getCheckout'
]);
Route::post('dat-hang', [
    'as' => 'dathang',
    'uses' => 'PageController@postCheckout'
]);
Route::get('dang-nhap', [
    'as' => 'Login',
    'uses' => 'PageController@getLogin'
]);
Route::post('dang-nhap', [
    'as' => 'Login',
    'uses' => 'PageController@postLogin'
]);
Route::get('dang-ki', [
    'as' => 'signup',
    'uses' => 'PageController@getSignup'
]);
Route::post('dang-ki', [
    'as' => 'signup',
    'uses' => 'PageController@postSignup'
]);
Route::get('dang-xuat', [
    'as' => 'logout',
    'uses' => 'PageController@postLogout'
]);
Route::get('search', [
    'as' => 'search',
    'uses' => 'PageController@getSearch'
]);



Route::get('home', 'HomeController@index')->name('home');

//login Admin

Route::get('admin', [
    'as' => 'admin',
    'uses' => 'AdminController@getAdmin'
])->middleware('CheckLogout');

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
])->middleware('CheckUser');

// Route::post('login',[
//    'as'=>'login',
//    'uses'=>'LoginController@login'
// ]);
Route::get('logout', [
    'as' => 'Logout',
    'uses' => 'AdminController@Logout'
]);

Route::post('logout', [
    'as' => 'Logout',
    'uses' => 'AdminController@Logout'
]);
//category

Route::get('admin/quan-ly-loai-san-pham', [
    'as' => 'Category',
    'uses' => 'AdminController@getCategory'
]);
Route::get('/admin/category/category_update/edit/{id}', 'AdminController@edit');
Route::PATCH('/admin/category/category_update/edit/{id}', 'AdminController@update');

Route::DELETE('/admin/category/category/delete/{id}', 'AdminController@destroy');

Route::get('/admin/category/category/create', 'AdminController@create');
Route::post('/admin/category/category/store', 'AdminController@store');

//user

Route::get('admin/quan-ly-san-pham', [
    'as' => 'Product',
    'uses' => 'AdminController@getProduct'
]);
Route::get('/admin/product/update/edit/{id}', 'AdminController@productEdit');
Route::PATCH('/admin/product/update/edit/{id}', 'AdminController@productUpdate');

Route::DELETE('/admin/product/product/delete/{id}', 'AdminController@productDestroy');

Route::get('/admin/product/product/create', 'AdminController@productCreate');
Route::post('/admin/product/product/store', 'AdminController@productStore');

//Customer

Route::get('admin/quan-ly-khach-hang', [
    'as' => 'Customer',
    'uses' => 'AdminController@getCustomer'
]);
Route::get('/admin/customer/update/edit/{id}', 'AdminController@customerEdit');
Route::PATCH('/admin/customer/update/edit/{id}', 'AdminController@customerUpdate');

Route::DELETE('/admin/customer/customer/delete/{id}', 'AdminController@customerDestroy');

Route::get('/admin/customer/customer/create', 'AdminController@customerCreate');
Route::post('/admin/customer/customer/store', 'AdminController@customerStore');

//Bill

Route::get('admin/quan-ly-hoa-don', [
    'as' => 'Bill',
    'uses' => 'AdminController@getBill'
]);
Route::post('/admin/bill/update/edit/{id}',[
    'as'=>'billEdit',
    'uses'=>'AdminController@billEdit'
 ]);

Route::post('/admin/bill/update/edit/{id}',[
    'as'=>'billUpdate',
    'uses'=>'AdminController@billUpdate'
    ]);

Route::DELETE('/admin/bill/bill/delete/{id}', 'AdminController@billDestroy');

Route::get('/admin/bill/bill/create', 'AdminController@billCreate');
Route::post('/admin/bill/bill/store', 'AdminController@billStore');
Route::post('/export-csv', 'AdminController@export_csv');
Route::post('/import-csv', 'AdminController@import_csv');

//BillDetail

Route::get('admin/quan-ly-chi-tiet-hoa-don', [
    'as' => 'BillDetail',
    'uses' => 'AdminController@getBillDetail'
]);
Route::get('/admin/billDetail/update/edit/{id}', 'AdminController@billDetailEdit');
Route::PATCH('/admin/billDetail/update/edit/{id}', 'AdminController@billDetailUpdate');

Route::DELETE('/admin/billDetail/billDetail/delete/{id}', 'AdminController@billDetailDestroy');

Route::get('/admin/billDetail/billDetail/create', 'AdminController@billDetailCreate');
Route::post('/admin/billDetail/billDetail/store', 'AdminController@billDetailStore');
