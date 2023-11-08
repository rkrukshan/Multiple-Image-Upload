<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [PostController::class, 'index'])->name('album.index');
Route::get('/create', [PostController::class, 'create'])->name('album.create');
Route::post('/post', [PostController::class, 'store'])->name('album.store');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('album.edit');
Route::get('/update/{id}', [PostController::class, 'update'])->name('album.update');
