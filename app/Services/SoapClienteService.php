<?php

namespace App\Services;

class SoapClientService
{
    protected $client;

    public function __construct()
    {
        $wsdl = config('soap.wsdl');

        $this->client = new \SoapClient($wsdl, [
            'trace' => true,
            'exceptions' => true,
        ]);
        $this->client = new \SoapClient($wsdl, [
            'trace' => true,
            'exceptions' => true,
            'connection_timeout' => 30
        ]);
    }

    public function enviarVivienda($data)
    {
        try {
            $response = $this->client->__soapCall('recibirVivienda', [$data]);

            return $response;

        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    public function enviarAvaluo($data)
    {
        try {
            $response = $this->client->__soapCall('recibirAvaluo', [$data]);

            return $response;

        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }
   
}