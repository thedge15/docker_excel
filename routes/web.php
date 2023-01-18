<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::prefix('/metals')->group(function () {
        Route::get('/', [\App\Http\Controllers\MetalController::class, 'index'])->name('metal.index');
        Route::get('/import', [\App\Http\Controllers\MetalController::class, 'import'])->name('metal.import');
        Route::post('/import', [\App\Http\Controllers\MetalController::class, 'importStore'])->name('metal.import.store');
    });
    Route::prefix('/tasks')->group(function () {
        Route::get('/', [\App\Http\Controllers\TaskController::class, 'index'])->name('task.index');
        Route::get('/{task}/failed_list', [\App\Http\Controllers\TaskController::class, 'failedList'])->name('task.failed_list');
    });
});


require __DIR__ . '/auth.php';
