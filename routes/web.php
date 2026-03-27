<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/soap', function () {
    return response()->file(storage_path('wsdl/service.wsdl'));
});