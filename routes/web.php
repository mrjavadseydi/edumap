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
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager')) {
            return view('panel.dashboard');
        } else {
            return redirect()->route('home');
        }
    })->name('dashboard');
});
Route::middleware('role:admin')->prefix('admin')->group(function () {
    Route::view('dashboard', 'panel.dashboard')->name('dashboard.index');
    Route::get('state', [StateController::class, 'index'])->name('state.index');
    Route::post('state', [StateController::class, 'store'])->name('state.create');
    Route::delete('state', [StateController::class, 'delete'])->name('state.delete');
    Route::get('book', [\App\Http\Controllers\BookController::class, 'index'])->name('book.index');
    Route::delete('book', [\App\Http\Controllers\BookController::class, 'delete'])->name('book.delete');
    Route::post('book', [\App\Http\Controllers\BookController::class, 'store'])->name('book.create');
    Route::resource('users', \App\Http\Controllers\UserController::class)->except('show', 'create', 'store');
    Route::get('comment', [\App\Http\Controllers\CommentController::class, 'index'])->name('comment.index');
    Route::get('comment/{id}/{status}', [\App\Http\Controllers\CommentController::class, 'update'])->name('comment.update');
    Route::delete('comment', [\App\Http\Controllers\CommentController::class, 'delete'])->name('comment.delete');
    Route::resource('need', \App\Http\Controllers\NeedMapController::class)->except('show');
    Route::resource('needSeason', \App\Http\Controllers\NeedSeasonController::class)->except('show');
    Route::resource('needDetail', \App\Http\Controllers\MapDetailController::class)->except('show');
    Route::get('board', [\App\Http\Controllers\BoardController::class, 'index'])->name('board.index');
    Route::delete('board', [\App\Http\Controllers\BoardController::class, 'delete'])->name('board.delete');
    Route::get('board/{id}/{status}', [\App\Http\Controllers\BoardController::class, 'update'])->name('board.update');
});
Route::get('map/{id}', [\App\Http\Controllers\NeedMapController::class, 'show'])->name('map.show');
Route::get('boards', [\App\Http\Controllers\BoardController::class, 'all'])->name('boards');
Route::middleware('auth')->group(function () {
    Route::post('comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
    Route::resource('total', \App\Http\Controllers\TotalController::class)->except('show');
    Route::get('totalMap', [\App\Http\Controllers\TotalController::class, 'show'])->name('total.show');
    Route::get('addBoard', [\App\Http\Controllers\BoardController::class, 'create'])->name('board.create');
    Route::post('addBoard', [\App\Http\Controllers\BoardController::class, 'store']);

});
