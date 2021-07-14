<?php 
use App\Http\Route;
use App\Controllers\Welcome;
use App\Controllers\ReportController;
use App\Controllers\ErrorController;

Route::get('/', function() {
    Welcome::view('welcome');
});

Route::get('report', function() {
    ReportController::view('report');
});

