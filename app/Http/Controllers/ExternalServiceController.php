<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class ExternalServiceController extends Controller {

    public function getExternalData() {
        try {
            $client = new Client;
            $response = $client->get('http://localhost:3000/api/endpoint');

            $body = json_decode($response->getBody(), true);

            return response()->json([
                'success'   => true,
                'data'      => $body
            ]);
        } catch (\Exceptino $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao se comunicar com o microserviço',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}