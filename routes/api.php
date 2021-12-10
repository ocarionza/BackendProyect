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

Route::apiResource('users', \App\Http\Controllers\UserControler::class);
Route::apiResource('sellers', \App\Http\Controllers\UserControler::class);
Route::apiResource('forum_questions', \App\Http\Controllers\Forum_QuestionController::class);
Route::apiResource('forum_answers', \App\Http\Controllers\Forum_AnswerController::class);
Route::apiResource('shop_comments', \App\Http\Controllers\Shop_CommentController::class);
Route::apiResource('products', \App\Http\Controllers\ProductController::class);
Route::apiResource('services', \App\Http\Controllers\ServiceController::class);
Route::apiResource('technicians', \App\Http\Controllers\TechnicianController::class);
Route::apiResource('technicians_comments', \App\Http\Controllers\Technician_CommentController::class);
