<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SupporterController;
use App\Models\Supporter;

Route::get('/', function () {
    return view('landing', [
        'supporters' => Supporter::where('email_verified_at', '!=', null)->where('public', true)->get(),
    ]);
});

Route::prefix("supporter")->group(function () {
    Route::post('submit', [SupporterController::class, 'store'])->name('supporter.submit');

    Route::get('verify/{id}/{token}', [SupporterController::class, 'verify'])->name('supporter.confirm-email');

    Route::get("verify/success", function () {
        return view('supporter.verify-success');
    })->name('supporter.verify.success');
});
