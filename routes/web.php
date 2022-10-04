<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ListController::class, 'index'])->name('home');
Route::get('add', [ListController::class, 'add'])->name('add');
Route::post('create', [ListController::class, 'create'])->name('create');
Route::get('view/{id}', [ListController::class, 'view'])->name('view');
Route::get('lihat/{id}', [ListController::class, 'lihat'])->name('lihat');
Route::post('update', [ListController::class, 'update'])->name('update');


Route::post('auth', [ListController::class, 'auth'])->name('auth');
Route::get('employee', [ListController::class, 'employee'])->name('employee');

Route::get('logout', [ListController::class, 'logout'])->name('logout');

Route::get('split', [ListController::class, 'getSplit']);