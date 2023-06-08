<?php

use Illuminate\Support\Facades\Route;

//外部のPostControllerクラスをインポート
use App\Http\Controllers\PostController;  

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


//投稿一覧表示
Route::get('/', [PostController::class, 'index']);


//投稿作成画面
Route::get('/posts/create', [PostController::class, 'create']);


//投稿表示
Route::get('/posts/{post}', [PostController::class ,'show']);


//投稿作成
Route::post('/posts', [PostController::class, 'store']);


//投稿編集画面表示
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);


//投稿編集保存
Route::put('/posts/{post}', [PostController::class, 'update']);


//投稿削除
Route::delete('/posts/{post}', [PostController::class,'delete']);