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
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware('role:admin')->prefix('admin')->group(function (){
    Route::get('state', [StateController::class,'index'])->name('state.index');
    Route::post('state', [StateController::class,'store'])->name('state.create');
    Route::delete('state', [StateController::class,'delete'])->name('state.delete');
    Route::get('book', [\App\Http\Controllers\BookController::class,'index'])->name('book.index');
    Route::post('book', [\App\Http\Controllers\BookController::class,'store'])->name('book.create');
    Route::delete('book', [\App\Http\Controllers\BookController::class,'delete'])->name('book.delete');
});
