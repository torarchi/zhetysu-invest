<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('news', [NewsController::class, 'index']);
Route::get('news/{id}', [NewsController::class, 'show']);

Route::group(['middleware' => ['auth:api', 'checkRole'], 'prefix' => 'admin'], function () {
    Route::post('news', [NewsController::class, 'store']);
    Route::put('news/{id}', [NewsController::class, 'update']);
    Route::delete('news/{id}', [NewsController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']); 
    Route::post('products', [ProductController::class, 'store']); 
    Route::put('products/{id}', [ProductController::class, 'update']); 
    Route::delete('products/{id}', [ProductController::class, 'destroy']); 

    Route::get('categories', [CategoryController::class, 'index']);
    Route::post('categories', [CategoryController::class, 'store']);
    Route::get('categories/{id}', [CategoryController::class, 'show']);
    Route::put('categories/{id}', [CategoryController::class, 'update']);
    Route::delete('categories/{id}', [CategoryController::class, 'destroy']);
});

Route::get('products/publicIndex', [ProductController::class, 'publicIndex']);
Route::get('products/{id}', [ProductController::class, 'show']);

Route::post('send-message', [MailController::class, 'sendMessage']);
