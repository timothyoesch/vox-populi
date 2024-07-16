<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupporterController;

Route::get('/', function () {
    return view("landing.index");
});

Route::post('/submit', [SupporterController::class, 'store'])->name('supporter.submit');

Route::get('/thanks', function () {
    return view("landing.thanks");
})->name('supporter.thanks');
