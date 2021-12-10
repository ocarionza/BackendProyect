<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('categories', \App\Http\Controllers\CategoryController::class);
Route::resource('user', \App\Http\Controllers\UserController::class);
Route::resource('forum_answers', \App\Http\Controllers\Forum_AnswerController::class);
Route::apiResource('sellers', \App\Http\Controllers\SellerController::class);
Route::resource('forum_questions', \App\Http\Controllers\Forum_QuestionController::class);
Route::apiResource('shop_comments', \App\Http\Controllers\Shop_CommentController::class);
Route::apiResource('products', \App\Http\Controllers\ProductController::class);
Route::apiResource('services', \App\Http\Controllers\ServiceController::class);
Route::apiResource('technicians', \App\Http\Controllers\TechnicianController::class);

//Ruta Login
Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('api.login');

//Middleware api
Route::middleware(['auth:sanctum'])->group(function() {
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('api.logout');
    Route::apiResource('users', \App\Http\Controllers\UserController::class);
    Route::apiResource('forum_questions', \App\Http\Controllers\Forum_QuestionController::class);
    Route::apiResource('forum_answers', \App\Http\Controllers\Forum_AnswerController::class);
    Route::apiResource('shop_comments', \App\Http\Controllers\Shop_CommentController::class);
    Route::apiResource('technicians_comments', \App\Http\Controllers\Technician_CommentController::class);
});
   
