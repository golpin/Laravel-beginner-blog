<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BlogController;

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

Route::get('/', [BlogController::class, 'guest'])->name('guest');

Route::middleware('auth:users')->group(function(){
    Route::get('/home', [BlogController::class, 'home'])->name('home');
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/store',[BlogController::class, 'store'])->name('store');
    Route::post('/delete/{id}',[BlogController::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [BlogController::class, 'update'])->name('update');
});

//Route::get('/blog{id}', [BlogController::class, 'show'])->name('show');

require __DIR__.'/auth.php';
