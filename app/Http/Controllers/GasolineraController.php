<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Codigo;
use Illuminate\Http\Request;

class GasolineraController extends Controller
{
    function index(Request $request)
    {

        $data = [];

        $client = new Client([
            'base_uri' =>  "https://api.datos.gob.mx/v1/precio.gasolina.publico",
        ]);
    
        $response = $client->request('GET');
    
        $precios = json_decode($response->getBody()->getContents())->results;
    
        
        $data['success'] = false;
        $data['results'] = [];
    
        if($precios || $response->statusCode() == 200)
        {
            $data['success'] = true;
            
            foreach ($precios as $key => $gas) {
                $estado = Codigo::getEdoByCP($gas->codigopostal);
                $ciudad = Codigo::getCdByCP($gas->codigopostal);
                $dieasel = $gas->dieasel != '' ? '$'.$gas->dieasel : '-';
    
                $gas->estado = $estado ? $estado->d_estado : '';
                $gas->ciudad = $ciudad ? $ciudad->d_ciudad : '';
                $gas->precio = 'Premium: $'. $gas->premium.' <br>Magna: $'.$gas->regular.' <br>Dieasel: '.$dieasel;
                $gas->mapa   =  '<a href="https://www.google.com.mx/maps/?q='.$gas->latitude.','.$gas->longitude.'" target="_blank">Ver ubicación <i class="icon nalika-eye"></i></a>';
                $data['results'][] = $gas;
            }
        }
    
        return $data;
    }
}
