<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
use App\Models\User;
Route::get('/', function () {
    //return view('welcome');
    $user = new user();
    $user ->name = 'aa';
    $user ->email ='12223';

});


Route::resource('products',ProductController::class);
/*
 * product.index:GET '/' ProductController@index , 列出所有產品
 *
 * product.show:GET|HEAD 'products/{product}' , ProductController@show , 檢視某一產品
 *
 * product.create:GET 'products' , ProductController@create , 產生產品新增的頁面
 *
 * product.store:POST 'products' , ProductController@store , 儲存新增的產品
 *
 * product.edit:GET|HEAD 'products/{product}/edit' , ProductController@update , 產生某一產品的修改頁面
 *
 * product.update:PUT|PATCH 'products/{product}' , ProductController@update , 更新某一產品
 *
 * product.destroy:DELETE 'products/{product}' , ProductController@destroy , 刪除某一產品
 *
 */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


