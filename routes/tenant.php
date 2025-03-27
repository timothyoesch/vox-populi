<?php
use Illuminate\Support\Facades\Route;
use Filament\Actions\Exports\Http\Controllers\DownloadExport;
use Filament\Actions\Imports\Http\Controllers\DownloadImportFailureCsv;

Route::get('/filament/exports/{export}/download', DownloadExport::class)
        ->name('filament.exports.download')
        ->middleware('filament.actions');

Route::get('/filament/imports/{import}/failed-rows/download', DownloadImportFailureCsv::class)
    ->name('filament.imports.failed-rows.download')
    ->middleware('filament.actions');
