<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
Route::get('/dbconn', function () {
    return view('dbconn');
});
// Route::get('/report', [ReportController::class, 'index']);
//     Route::get('/report/{id}', [ReportController::class, 'show']);
//     Route::post('/report/{id}/corriger', [ReportController::class, 'corriger']);
//     Route::post('/report/{id}/marquer-vu', [ReportController::class, 'marquerVu']);