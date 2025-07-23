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

Route::get("/series/{series}/series", [SeasonsController::class, "index"])->name("seasons.index")->middleware(Authenticator::class);

Route::get("/seasons/{season}/episodes", [EpisodesController::class, "index"])->name("episodes.index")->middleware(Authenticator::class);
Route::post("/seasons/{season}/episodes", [EpisodesController::class, "update"])->name("episodes.update")->middleware(Authenticator::class);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('signin');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware(Authenticator::class);

Route::get('/user', [UsersController::class, 'create'])->name('users.create');
Route::post('/user', [UsersController::class, 'store'])->name('users.store');
