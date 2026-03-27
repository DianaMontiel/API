<?php

namespace App\Services;

use App\Models\Vivienda;
use App\Models\Avaluo;
use App\Models\Solicitante;
use App\Models\Oferente;

class SoapService
{
    public function guardarVivienda($data)
    {
        return Vivienda::create([
            'direccion' => $data['direccion'] ?? null,
            'ciudad' => $data['ciudad'] ?? null,
            'estado' => $data['estado'] ?? null,
            'codigo_postal' => $data['cp'] ?? null
        ]);
    }

    public function guardarAvaluo($data)
    {
        return Avaluo::create([
            'valor' => $data['valor'] ?? null,
            'fecha' => $data['fecha'] ?? null
        ]);
    }
}