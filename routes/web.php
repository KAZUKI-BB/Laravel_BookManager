<?php

use App\Http\Controllers\Bookcontroller;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\Searchcontroller;
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
/* デフォルトURLの指定 */
Route::get('/',function(){
    return redirect(route('login'));
});

/* ログイン関連 */
Route::get('/login',[Logincontroller::class,'index'])->name('login');
Route::post('/login',[Logincontroller::class,'check']);
Route::get('/logout',[Logincontroller::class,'logout'])->middleware('auth')->name('logout');

/* メイン画面 */
Route::get('/home',[Bookcontroller::class,'index'])->middleware('auth')->name('home');

/* 新規書籍情報の登録 */
Route::get('/home/create',[Bookcontroller::class,'create'])->middleware('auth')->name('create');
Route::post('/home/create',[Bookcontroller::class,'store'])->middleware('auth');

/* 既存の書籍情報の編集 */
Route::get('/home/edit/{id}',[Bookcontroller::class,'edit'])->middleware('auth')->name('edit');
Route::post('/home/edit/{id}',[Bookcontroller::class,'update'])->middleware('auth');

/* 書籍情報の削除 */
Route::get('/home/destroy/{id}',[Bookcontroller::class,'destroy'])->middleware('auth')->name('destroy');