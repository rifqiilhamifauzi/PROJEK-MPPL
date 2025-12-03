<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('attendance', App\Http\Controllers\Admin\AttendanceController::class);

});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    // Registrations
    Route::get('/registrations', [App\Http\Controllers\Admin\RegistrationController::class, 'index'])->name('admin.registrations.index');
    Route::get('/registrations/create', [App\Http\Controllers\Admin\RegistrationController::class, 'create'])->name('admin.registrations.create');
    Route::post('/registrations', [App\Http\Controllers\Admin\RegistrationController::class, 'store'])->name('admin.registrations.store');
    Route::get('/registrations/{id}/edit', [App\Http\Controllers\Admin\RegistrationController::class, 'edit'])->name('admin.registrations.edit');
    Route::put('/registrations/{id}', [App\Http\Controllers\Admin\RegistrationController::class, 'update'])->name('admin.registrations.update');
    Route::delete('/registrations/{id}', [App\Http\Controllers\Admin\RegistrationController::class, 'destroy'])->name('admin.registrations.destroy');
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Event Management
    Route::resource('events', \App\Http\Controllers\Admin\EventController::class);

});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('profiles', ProfileController::class);
    });

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
});

Route::match(['get', 'post'], 'register', function () {
    abort(404);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
});
