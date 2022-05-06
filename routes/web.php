<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','layout.app')->name('/');

Route::prefix('pokemon')->group(function () {
    Route::get('index',[PokemonController::class,'index'])->name("index");
    Route::get('detail/{pokemonName}',[PokemonController::class,'detail'])->name("detail");
    Route::get('search',[PokemonController::class,'search'])->name("search");
});
