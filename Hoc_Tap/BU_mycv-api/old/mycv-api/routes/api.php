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

Route::resource('informations', InformationControllers::class);

