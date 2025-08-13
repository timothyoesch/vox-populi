<?php

use App\Models\Supporter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SupporterController;
use Filament\Actions\Exports\Http\Controllers\DownloadExport;
use Filament\Actions\Imports\Http\Controllers\DownloadImportFailureCsv;

Route::get('/', function () {
    return view('landing', [
        'supporters' => Supporter::all(),
    ]);
})->name('landing');

// Make regex route for /de, /fr, /it to set languages
Route::get('/{lang}', function ($lang) {
    // Return redirect with cookie «APP_LOCALE»
    return redirect()->route('landing')->withCookie(cookie('APP_LOCALE', $lang));
})->where('lang', 'de|fr|it');

Route::prefix("supporter")->group(function () {
    Route::post('submit', [SupporterController::class, 'store'])->name('supporter.submit');

    Route::get("thx", function () {
        if (!request()->name) {
            return redirect()->route('landing');
        }
        return view('supporter.success');
    })->name('supporter.success');

    Route::get("donate", function () {
        return view('supporter.donate');
    })->name('supporter.donate');
});
