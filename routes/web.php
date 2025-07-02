<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/',[ServiceController::class, 'homepage'])->name('homepage');


Route::controller(ServiceController::class)->name('services.')->prefix('/usluge')->group(function () {
    Route::get('/katalog-usluga','catalog')->name('catalog');
    Route::get('/{id}', 'detail')->name('detail');

    Route::get('/kreiraj-rezervaciju','createReservation')->name('reservations.create');
    Route::post('/kreiraj-rezervaciju', 'storeReservation')->name('reservations.store');
});

Route::get('/dashboard', function () {
    return redirect(route('dashboard.services.index'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/app.php';

require __DIR__.'/auth.php';
