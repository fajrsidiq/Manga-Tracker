<?php

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
use App\Http\Controllers\MangaController;

Route::get('/', [MangaController::class, 'index']);
Route::get('/create', [MangaController::class, 'create'])->name('create');
Route::post('/create', [MangaController::class, 'store']); // New route for handling the form submission
Route::get('/mangas/edit/{id}', [MangaController::class, 'edit'])->name('mangas.edit');
Route::put('/mangas/update/{id}', [MangaController::class, 'update'])->name('mangas.update'); // New route for updating manga
Route::delete('/mangas/destroy/{id}', [MangaController::class, 'destroy'])->name('mangas.destroy');