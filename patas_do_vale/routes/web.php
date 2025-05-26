<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogsController;

// Route::get('/home', function () {
//     return "<h1>Curso de laravel</h1>";
// });

// Enviando parametros estaticos
// Route::view('/home','home',['name' => 'Marcus André Geacomo Demarchi']);

Route::get('/home', function () {
    return view('home');
});

Route::get('/dogs',[DogsController::class, 'index']);

// Enviando parametros dinamicos - utilizando filtro para URL 
// Route::get('/home/{name?}', function($name = null){
//     return view('home', ['teste' => $name]);
// }) -> where('name','[A-Za-z]+');

Route::fallback(function(){
    return "<h1>Atenção : A rota em questão não existe</h1>"; 
});