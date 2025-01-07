<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/job-list', function () {
    return view('job-list');
});

Route::get('/job-detail', function () {
    return view('job-detail');
});