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

Route::post('/posts', [App\Http\Controllers\ApiPostController::class, 'posts'])->name('api.getPosts');
Route::post('/post', [App\Http\Controllers\ApiPostController::class, 'post'])->name('api.getPost');
Route::post('/posts/create', [App\Http\Controllers\ApiPostController::class, 'create'])->name('api.postCreate');
Route::post('/posts/update', [App\Http\Controllers\ApiPostController::class, 'update'])->name('api.postUpdate');
Route::post('/posts/delete', [App\Http\Controllers\ApiPostController::class, 'delete'])->name('api.postDelete');


Route::post('/comments/create', [App\Http\Controllers\ApiCommentController::class, 'create'])->name('api.commentCreate');
Route::post('/comments/update', [App\Http\Controllers\ApiCommentController::class, 'update'])->name('api.commentUpdate');
Route::post('/comments/delete', [App\Http\Controllers\ApiCommentController::class, 'delete'])->name('api.commentDelete');
