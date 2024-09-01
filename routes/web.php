<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\WeaponController;

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/personnel', [PersonnelController::class, 'index'])->name('personnel.index');
Route::get('/personnel/create', [PersonnelController::class, 'create'])->name('personnel.create');
Route::post('/personnel', [PersonnelController::class, 'store'])->name('personnel.store');
Route::get('/personnel/{personnel}/edit', [PersonnelController::class, 'edit'])->name('personnel.edit');
Route::patch('/personnel/{personnel}', [PersonnelController::class, 'update'])->name('personnel.update');
Route::delete('/personnel/{personnel}', [PersonnelController::class, 'destroy'])->name('personnel.destroy');
Route::get('/personnel/{personnel}/show', [PersonnelController::class, 'show'])->name('personnel.show');

Route::get('/weapon', [WeaponController::class, 'index'])->name('weapon.index');
Route::get('/weapon/create', [WeaponController::class, 'create'])->name('weapon.create');
Route::post('/weapon', [WeaponController::class, 'store'])->name('weapon.store');
Route::get('/weapon/{personnel}/edit', [WeaponController::class, 'edit'])->name('weapon.edit');
Route::patch('/weapon/{personnel}', [WeaponController::class, 'update'])->name('weapon.update');
Route::delete('/weapon/{personnel}', [WeaponController::class, 'destroy'])->name('weapon.destroy');
Route::get('/weapon/{personnel}/show', [WeaponController::class, 'show'])->name('weapon.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
