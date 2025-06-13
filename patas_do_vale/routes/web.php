<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

Route::get('/create_account', [UserController::class,'create'])->name('create_account');
Route::post('/create_account',[UserController::class,'store'])->name('insert_account');

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class,'loginAttempt'])->name('auth');

Route::get('/dashboard', function(){  
    return 'Login efetuado com sucesso';
})->name('dashboard');

Route::get('/forgot_password', function(){  
    return 'Caso esqueceu a senha';
})->name('forgot_password');

Route::fallback(function(){
    return "<h1><b>Atenção : A rota em questão não existe<\b></h1>"; 
});