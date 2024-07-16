<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SupporterController;

Route::get('/', function () {
    return view("landing.index");
});

Route::post('/submit', [SupporterController::class, 'store'])->name('supporter.submit');

Route::get('/thanks', function () {
    return view("landing.thanks");
})->name('supporter.thanks');

Route::get("/cron", function() {
    Artisan::call('schedule:run --no-interaction');
    Artisan::call('queue:work --stop-when-empty');
    return response()->json(['message' => 'Cron jobs have been executed and queue has been worked']);
});
