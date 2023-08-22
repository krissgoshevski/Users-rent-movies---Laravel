<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// ovie se site ruti koi sto teba da ni bidat zastiteni so middleware
Route::middleware('auth')->group(function () {
    
    Route::get('/list', [MovieController::class, 'list'])->name('movie.list_index'); // za gledanje na site filmovi


    Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create'); // ke ja vrakame formata za kreiranje na nekoj film 
    Route::post('/movie/store', [MovieController::class, 'store'])->name('movie.store'); // za zacuvuvanje na nekoj movie 


    Route::get('/movie/edit/{movie}', [MovieController::class, 'edit'])->name('movie.edit');
    Route::put('/movie/update/{movie}', [MovieController::class, 'update'])->name('movie.update'); // za da go zacuvame za edit vo baza 



    Route::delete('/movie/delete/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');

    Route::post('/movie/rent/{movie}', [RentController::class, 'rent'])->name('movie.rent');

});
