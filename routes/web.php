<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::view('/mapel', 'mapel')
    ->middleware(['auth'])
    ->name('mapel');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::get('/jadwal', function () {
    $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
    $mapels = \App\Models\Mapel::all();
    
    return view('jadwal', compact('days', 'mapels'));
})->middleware('auth')->name('jadwal');

require __DIR__.'/auth.php';