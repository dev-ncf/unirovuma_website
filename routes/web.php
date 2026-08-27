<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/manutencao', function () {
    return view('manutencao');
})->name('manutencao');
