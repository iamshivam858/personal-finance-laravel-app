<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->middleware('LoggedIn')->group(function(){
    Route::post('/signup',[UserController::class,'signup']);
    Route::get('/signup',[UserController::class,'signup_get']);
    Route::match(['get','post'],'/login',[UserController::class,'login']);
});

Route::middleware(['CheckUserLogin'])->group(function(){

    Route::get('/user/logout',[UserController::class,'logout']);
    Route::post('/download',[BaseController::class,'download']);

    Route::match(['get','post'],'/',[BaseController::class,'dashboard']);
    Route::match(['get','post'],'/reports',[BaseController::class,'reporting']);

    Route::prefix('category')->group(function(){
        Route::match(['get','post'],'/create',[CategoryController::class,'createCategory']);
        Route::get('/all',[CategoryController::class,'all']);
        Route::get('/delete/{id}',[CategoryController::class,'deleteCategory']);
        Route::match(['get','post'],'/edit/{id}',[CategoryController::class,'updateCategory']);
    });

    Route::prefix('transaction')->group(function(){
        Route::match(['get','post'],'/create',[TransactionController::class,'createTransaction']);
        Route::get('/all',[TransactionController::class,'allTransactions']);
        Route::get('/delete/{id}',[TransactionController::class,'deleteTransaction']);
        Route::match(['get','post'],'/edit/{id}',[TransactionController::class,'updateTransaction']);
    });

});


