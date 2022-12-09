<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todo;
use App\Http\Controllers\RandomTask;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [Todo::class, 'index'])->middleware(['auth'])->name('home');
Route::post('/todos', [Todo::class, 'store'])
->middleware(['auth']);
Route::put('/todos/{id}', [Todo::class, 'update'])
->middleware(['auth']);
Route::delete('/todos/{id}', [Todo::class, 'destroy'])
->middleware(['auth']);
Route::get('/completed', [Todo::class, 'getCompletedTasks'])->middleware(['auth'])->name('completed');
Route::put('/completeTask/{id}', [Todo::class, 'completeTask'])
->middleware(['auth']);
Route::get('/getrandomtask', [RandomTask::class, 'get'])->middleware(['auth'])->name('getRandomTask');