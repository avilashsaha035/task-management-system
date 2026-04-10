<?php

use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\HomeController;
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


// landing page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Backend Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('tasks', TaskController::class)
     ->names([
            'index'   => 'admin.tasks.index',
            'create'  => 'admin.tasks.create',
            'store'   => 'admin.tasks.store',
            'edit'    => 'admin.tasks.edit',
            'update'  => 'admin.tasks.update',
            'destroy' => 'admin.tasks.destroy',
        ]);
});


require __DIR__ . '/auth.php';
