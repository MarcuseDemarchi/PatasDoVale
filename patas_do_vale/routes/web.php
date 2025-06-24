<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\DoacaoAnimalController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/create_account', [UserController::class,'create'])->name('create_account');
Route::post('/create_account',[UserController::class,'store'])->name('insert_account');

Route::get('/login', [AuthController::class,'index'])->name('login');

Route::middleware(['throttle:login-attempts'])->group(function () {
    Route::post('/login', [AuthController::class, 'loginAttempt'])->name('auth');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[DashBoardController::class,'index'])->name('dashboard');
    Route::get('/animais/{id}', [AnimalController::class, 'show'])->name('animais.show');

    Route::resource('/dashboard/pessoas', PessoaController::class);

    Route::post('/animais', [AnimalController::class, 'store'])->name('animais.store');
    Route::delete('/animais/{id}', [AnimalController::class, 'destroy'])->name('animais.destroy');    
    Route::get('/animais/{id}/edit', [AnimalController::class, 'edit'])->name('animais.edit');
    Route::put('/animais/{id}', [AnimalController::class, 'update'])->name('animais.update');

    Route::resource('/dashboard/adocoes', \App\Http\Controllers\DoacaoAnimalController::class)->names('adocoes')->except(['edit', 'update', 'show', 'create']);

    Route::get('/api/cidades/{estado}', function($estado) {
        return \App\Models\Cidade::where('estcodigo', $estado)->get();
    });
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot_password', function(){  
    return 'Caso esqueceu a senha';
})->name('forgot_password');

Route::fallback(function(){
    return "<h1><b>Atenção : A rota em questão não existe<\b></h1>"; 
});