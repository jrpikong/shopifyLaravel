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
    $shopDomain = session('shopify_domain');
    $shop = [];
    if($shopDomain) {
        $shop = ShopifyApp::shop()->where('shopify_domain', $shopDomain)->first();
    }
    return view('welcome',compact('shop'));
})->name('home');

Route::get(
    '/maps-filter/{filter}',
    'AppProxyController@filterCity'
)->middleware('cors');
Route::get(
    '/maps',
    'AppProxyController@loadViewElement'
)->middleware('cors');