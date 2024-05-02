<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LoginController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Gate;

//Route::resource('produtos', ProdutoController::class);
//Route::resource('users', UserController::class);
Route::get('/',[SiteController::class, 'index'])->name('site.index');
Route::get('/produto/{slug}',[SiteController::class, 'details'])->name('site.details');
Route::get('/categoria/{id}',[SiteController::class, 'categoria'])->name('site.categoria');
Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho',[CarrinhoController::class, 'AdicionaCarrinho'])->name('site.addcarrinho');
Route::post('/remover', [CarrinhoController::class, 'removeCarrinho'])->name('site.removecarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'atualizaCarrinho'])->name('site.atualizacarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('site.limparcarrinho');
Route::view('/login','login.form')->name('login.form');
Route::get('/auth',[LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout',[LoginController::class, 'logout'])->name('login.logout');
Route::get('/register',[LoginController::class, 'create'])->name('login.create');
Route::get('/admin/dashboard',[DashboardController::class, 'index'])->name('admin.dashboard')->Middleware('auth');
Route::get('/admin.produtos', [ProdutoController::class, 'index'])->name('admin.produtos');
Route::delete('/admin/produto/delete/{id}', [ProdutoController::class, 'destroy'])->name('admin.produto.delete');
Route::post('/admin/produto/store', [ProdutoController::class, 'store'])->name('admin.produtos.store');