<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SoapService;
use App\Models\Vivienda;
use App\Models\Avaluo;
use Illuminate\Support\Facades\Log;

class SoapController extends Controller
{
    protected $soapService;

    public function __construct(SoapService $soapService)
    {
        $this->soapService = $soapService;
    }

    // Recibir Vivienda
    public function recibirVivienda(Request $request)
    {
        try {
            $xml = $request->getContent();
            $data = simplexml_load_string($xml);

            // Validaciones
            if (empty($data->direccion) || empty($data->ciudad)) {
                throw new \Exception("direccion y ciudad son obligatorios");
            }

            // Guardar en BD
            Vivienda::create([
                'direccion' => (string) $data->direccion,
                'ciudad' => (string) $data->ciudad
            ]);

            return response(
                '<response><status>OK</status></response>',
                200
            )->header('Content-Type', 'text/xml');

        } catch (\Exception $e) {
            // Registrar error
            Log::error('Error al recibir Vivienda: '.$e->getMessage());

            return response(
                '<response><status>ERROR</status><message>'.$e->getMessage().'</message></response>',
                500
            )->header('Content-Type', 'text/xml');
        }
    }

    // Recibir Avalúo
    public function recibirAvaluo(Request $request)
    {
        try {
            $xml = $request->getContent();
            $data = simplexml_load_string($xml);

            // Validaciones
            if (empty($data->folio) || empty($data->valor)) {
                throw new \Exception("folio y valor son obligatorios");
            }

            // Guardar en BD
            $avaluo = Avaluo::create([
                'folio' => (string)$data->folio,
                'valor' => (float)$data->valor
            ]);

            // Respuesta con id insertado
            return response(
                '<response><status>OK</status><id>'.$avaluo->id.'</id></response>',
                200
            )->header('Content-Type', 'text/xml');

        } catch (\Exception $e) {
            Log::error('Error al recibir Avalúo: '.$e->getMessage());

            return response(
                '<response><status>ERROR</status><message>'.$e->getMessage().'</message></response>',
                500
            )->header('Content-Type', 'text/xml');
        }
    }
}