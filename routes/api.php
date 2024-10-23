<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Configuration;
use App\Http\Controllers\ApiController;

Route::get('/{configuration:key}/supporters', [ApiController::class, 'configurationSupporters'])->middleware('auth:sanctum');
