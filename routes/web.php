<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('to-do/{to_do}/complete', [ToDoController::class, 'complete'])
    ->name('to-do.complete')
    ->middleware('auth');

Route::resource('to-do', ToDoController::class)
->only(['index', 'store','edit','update','destroy'])
->middleware(['auth']);

require __DIR__.'/auth.php';
