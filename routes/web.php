<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Test\TestController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/{url}', function () {
//     return response()->view('errors.403', [], 403);
// })->where('url', 'register');

Route::get('/password/{url}', function () {
    abort(403);
})->where('url', '.*');

Route::get('/{url}', function () {
    abort(403);
})->where('url', 'register');

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [TestController::class, 'index'])->name('dashboard');
    Route::get('/setting', [TestController::class, 'index'])->name('setting');
    Route::get('/role', [TestController::class, 'index'])->name('role');
    Route::get('/user', [TestController::class, 'index'])->name('user');
});

Route::middleware(['auth', 'role:Superadmin,Admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.dashboard');
});

// Test Section
Route::prefix('test')->group(function () {
    Route::get('test1', [TestController::class, 'test1'])->name('test.test1');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
