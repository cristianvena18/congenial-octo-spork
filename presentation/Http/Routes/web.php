<?php

use Illuminate\Support\Facades\Route;
use Presentation\Http\Actions\Products\IndexProductAction;

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
    return redirect('/products');
});



Route::group(['prefix' => 'products'], function () {
    Route::get('/', IndexProductAction::class);

    Route::get('/new', function () {
        return view('productNew');
    });
});
