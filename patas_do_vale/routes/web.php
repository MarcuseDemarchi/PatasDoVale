<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/create_account', [UserController::class,'create'])->name('create_account');
Route::post('/create_account',[UserController::class,'store'])->name('insert_account');

Route::get('/login', function(){  
    return view('login');
})->name('login');

Route::post('/login', function(){  
    return 'Autenticaçao do usuario';
})->name('auth');

Route::get('/forgot_password', function(){  
    return 'Caso esqueceu a senha';
})->name('forgot_password');

Route::fallback(function(){
    return "<h1><b>Atenção : A rota em questão não existe<\b></h1>"; 
});