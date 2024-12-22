<?php
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::get('/report', [ReportController::class, 'index']);
    Route::get('/report/{id}', [ReportController::class, 'show']);
    Route::post('/report/{id}/corriger', [ReportController::class, 'corriger']);
    Route::post('/report/{id}/marquer-vu', [ReportController::class, 'marquerVu']);
});
