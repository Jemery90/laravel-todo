<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todo;

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
Route::get('/', [Todo::class, 'index'])->name('home');
Route::post('/todos', [Todo::class, 'store']);
Route::put('/todos/{id}', [Todo::class, 'update']);
Route::delete('/todos/{id}', [Todo::class, 'destroy']);
Route::get('/completed', [Todo::class, 'getCompletedTasks'])->name('completed');
Route::put('/completeTask/{id}', [Todo::class, 'completeTask']);