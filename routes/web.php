<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(Authenticator::class);

Route::get('/ola', function () {
    echo "Olá, Mundo!";
});

// Route::controller(SeriesController::class)->group(function() {
//     Route::get('/series', "index")->name("series.index");
//     Route::get('/series/create', "create")->name("series.create");
//     Route::post('/series/salvar', "store")->name("series.store");
// });

Route::resource('/series', SeriesController::class)
    ->except("show");
    // ->only(["index", "create", "store", "destroy", "edit"]);
// Route::delete("/series/destroy/{id}", [SeriesController::class, "destroy"])->name("series.destroy");
//Route::post("/series/destroy/{id}", [SeriesController::class, "destroy"])->name("series.destroy");

Route::middleware("authenticator")->group(function () {
    Route::get("/series/{series}/seasons", [SeasonsController::class, "index"])->name("seasons.index");

    Route::get("/seasons/{season}/episodes", [EpisodesController::class, "index"])->name("episodes.index");
    Route::post("/seasons/{season}/episodes", [EpisodesController::class, "update"])->name("episodes.update");

    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('signin');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('/user', 'create')->name('users.create');
    Route::post('/user', 'store')->name('users.store');
});
