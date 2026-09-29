<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang-Ucok', function () {
    return view('about'); // Kita akan menampilkan view bernama 'about'
});

Route::get('/Kontak-Ucok', function () {
    return view('kontak'); // Kita akan menampilkan view bernama 'about'
});