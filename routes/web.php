<?php

use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin'))
            return view('panel.dashboard');
         else
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware('role:admin')->prefix('admin')->group(function (){
    Route::view('dashboard','panel.dashboard')->name('dashboard.index');
    Route::get('state', [StateController::class,'index'])->name('state.index');
    Route::post('state', [StateController::class,'store'])->name('state.create');
    Route::delete('state', [StateController::class,'delete'])->name('state.delete');
    Route::get('book', [\App\Http\Controllers\BookController::class,'index'])->name('book.index');
    Route::delete('book', [\App\Http\Controllers\BookController::class,'delete'])->name('book.delete');
    Route::post('book', [\App\Http\Controllers\BookController::class,'store'])->name('book.create');
    Route::resource('users',\App\Http\Controllers\UserController::class)->except('show','create','store');
    Route::get('comment', [\App\Http\Controllers\CommentController::class,'index'])->name('comment.index');
    Route::get('comment/{id}/{status}', [\App\Http\Controllers\CommentController::class,'update'])->name('comment.update');
    Route::delete('comment', [\App\Http\Controllers\CommentController::class,'delete'])->name('comment.delete');
    Route::resource('total',\App\Http\Controllers\TotalController::class)->except('show');
    Route::get('admin_total/{id}', [\App\Http\Controllers\TotalController::class,'admin_show'])->name('total.admin_show');

});
Route::middleware('auth')->group(function (){
    Route::post('comment', [\App\Http\Controllers\CommentController::class,'store'])->name('comment.store');
    Route::get('total', [\App\Http\Controllers\TotalController::class,'show'])->name('total.show');
});
