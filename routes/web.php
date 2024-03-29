<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    

    // Use unique names for admin routes
    Route::get('/admin/users/{user}/edit', [ProfileController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/admin/users/{user}', [ProfileController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/users/add', [ProfileController::class, 'create'])->name('admin.users.add');
    Route::post('/admin/users/add', [ProfileController::class, 'store'])->name('admin.users.store');
    Route::delete('/admin/users/{user}', [ProfileController::class, 'destroy'])->name('admin.users.destroy');



}); 

require __DIR__ . '/auth.php';
