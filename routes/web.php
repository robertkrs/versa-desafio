<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\HomeController;

Route::get('/', [LoginController::class, 'index'] )->name('site.login-index');
Route::any('/login', [LoginController::class, 'login'])->name('site.login');

Route::resource('user', UserController::class)->except('show','destroy','edit');

Route::prefix('/painel')->group(function(){    
    Route::get('/home', [HomeController::class, 'index'])->name('painel.home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('painel.logout');
    Route::get('/minha-area', [UserController::class, 'minhaArea'])->name('painel.minha-area');
    
    Route::resource('agenda', AgendaController::class);
    });

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('painel.home').'">clique aqui</a> para ir para página inicial';
});