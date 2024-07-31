<?php

use App\Http\Controllers\FilmesController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('auth/register');
});


/**Redirecionamento */
Route::get("/index", [FilmesController::class, "index"]);
Route::get("/cadastrar", [FilmesController::class, "cadastrar"]);
Route::get("/editar/{id}", [FilmesController::class, "editar"]);
Route::get("/listartabela", [FilmesController::class,"listartabela"]);


/*Funções */
Route::post("/adicionar", [FilmesController::class, "adicionar"]);
Route::post("/atualizar/{id}", [FilmesController::class, "atualizar"]);
Route::get("/excluir/{id}", [FilmesController::class, "excluir"]);


Route::post("/favoritar/{id}", [FilmesController::class, "favoritar"]);
Route::post("/desfavoritar/{id}", [FilmesController::class, "desfavoritar"]);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
