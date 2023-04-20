<?php

use App\Http\Controllers\TarefaController;
use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'index'])->name('index');

Route::get('/create', [TaskController::class, 'create'])->name('create');

Route::post('/store', [TaskController::class, 'store'])->name('store');

Route::put('/update/{id}', [TaskController::class, 'updateStatus'])->name('updateStatus');

Route::get('/update/task/{id}', [TaskController::class, 'editTask'])->name('editTask');

Route::delete('/delete/{id}', [TaskController::class, 'destroy'])->name('deletar');

// Route::get('/', [TarefaController::class, 'index'])->name('index');

// Route::get('/create',[TarefaController::class, 'create'])->name('create');

// Route::post('/store', [TarefaController::class, 'store'])->name('store');

// Route::put('/update', [TarefaController::class, 'update'])->name('update');

// Route::delete('/delete', [TarefaController::class, 'destroy'])->name('delete');