<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\InformationControllers;
use App\Http\Controllers\Api\MailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->group(function () {
    Route::post('/register', [LoginController::class, 'register'])->name('api.register');
    Route::post('/login', [LoginController::class, 'login'])->name('api.login');
    Route::post('/forgot-password', [LoginController::class, 'forgotPassword'])->name('api.forgotPassword');
});

Route::post('/send-test-mail', [MailController::class, 'sendTestMail'])->name('api.sendTestMail');


Route::middleware('auth:sanctum')->group(function () { 
    Route::resource('informations', InformationControllers::class);

    Route::prefix('informations')->group(function () {        
        Route::post('/', [LoginController::class, 'index'])->name('api.logout');
        Route::post('/change-password', [LoginController::class, 'change_password'])->name('api.change_password');
    });    

    // Route::prefix('auth')->group(function () {        
    //     Route::post('/logout', [LoginController::class, 'logout'])->name('api.logout');
    //     Route::post('/change-password', [LoginController::class, 'change_password'])->name('api.change_password');
    // });

    // Route::group(['prefix' => 'categories'], function () {
    //     Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
    //     Route::post('/', [CategoriesController::class, 'create'])->name('categories.create');
    //     Route::get('/{id}', [CategoriesController::class, 'edit'])->name('categories.Edit');
    //     Route::post('/update/{id}', [CategoriesController::class, 'update'])->name('categories.Update');
    //     Route::delete('/{id}', [CategoriesController::class, 'delete'])->name('categories.Delete');
    // });
    
});
