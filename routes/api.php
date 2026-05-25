<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;

Route::apiResource('mapels', MapelController::class);