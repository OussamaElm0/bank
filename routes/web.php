<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use \App\Http\Controllers\VirementController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('virements',VirementController::class)
        ->only(['create','store']);
Route::middleware(['auth', 'isEmployer'])->group(function () {
    Route::resource('clients',ClientController::class);
    Route::get('dons/{id}',[\App\Http\Controllers\DonController::class,'show']);
});
Route::get('clients/{client}/virements',[VirementController::class,'consulter'])
        ->name('virements.consulter');

Route::middleware('isClient')->group(function (){
    Route::get('clients/{client}/dons',[ClientController::class,'show_dons'])
            ->name('clients.dons');
    Route::get('clients/{client}/dons/create',[\App\Http\Controllers\DonController::class,'create'])
        ->name('clients.dons.create');
    Route::post('dons',[\App\Http\Controllers\DonController::class,'store'])
        ->name('dons.store');
});

require __DIR__.'/auth.php';
