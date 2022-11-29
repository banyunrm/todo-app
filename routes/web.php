<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('islogin')->group(function(){
    Route::get('/complated',[Todocontroller::class,'complated'])->name('complated');
    Route::get('/create',[TodoController::class, 'create'])->name('create');
    Route::get('/todo', [TodoController::class, 'todo'])->name('todo');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    //route path yang menggunakan { } berarti dia berperan sebagai parameter route
    //parameter ini bentuknya data dinamis (data yang dikirim ke route untuk diambil di parameter function controller terkait)
    Route::get('/edit/{id}',[TodoController::class, 'edit'])->name('edit');
    //method route untuk ubah data di db itu patch/put
    Route::patch('/todo/update/{id}',[TodoController::class,'update'])->name('update');
});

Route::middleware('isGuest')->group(function(){
    Route::get('/register', [TodoController::class,'register']);
    Route::post('/register', [TodoController::class,'registerAccount'])->name('register-input');
    Route::post('/login/auth',[TodoController::class,'auth'])->name('login.auth');
    Route::get('/login', [TodoController::class, 'login'])->name('login');
});

Route::get('/logout',[TodoController::class, 'logout'])->name('logout');