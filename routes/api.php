<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoapController;
use App\Http\Controllers\ViviendaController;
use App\Http\Controllers\AvaluoController;


Route::middleware('apiauth')->group(function () {
    Route::post('/soap/recibir-vivienda', [SoapController::class, 'recibirVivienda']);
    Route::post('/soap/recibir-avaluo', [SoapController::class, 'recibirAvaluo']);
    
    Route::apiResource('viviendas', ViviendaController::class);
    Route::apiResource('avaluos', AvaluoController::class);
});