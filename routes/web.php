<?php

use App\Http\Controllers\ComputerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;

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

Route::get('/', [StaticController::class, 'home'])->name('home');
Route::get('/about', [StaticController::class, 'about'])->name('about');
Route::get('/contact', [StaticController::class, 'contact'])->name('contact');

// hna khdamni bi resource 7itach [get] ma ta3tinach anana ndiro delete / update / .... 7itach class staticController ghir controller 3adi
// machi b7al ComputerController (-r ya3bi resource) lihada imkan lina ndiro 3lih delete / update / ...
// exemple : Route::get('/computer/edit', [StaticController::class, 'contact'])->name('contact');
// + illa khdamna fi get ghadi ikhasna nwaliw ndiro (computer/edit | computer/delete | ...), ms illa khdama bi resource la
Route::resource('computer', ComputerController::class);

