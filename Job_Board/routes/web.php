<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);

Route::resource('jobs', JobController::class);

Route::resource('companies', CompanyController::class);

Route::resource('applications', ApplicationController::class);

Route::resource('skills', SkillController::class);

// Rota para a página inicial (opcional)
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

Route::get('/company', function () {
    return view('company');
});
Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');