<?php
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;

Route::view('/','home')->name('home');
Route::get('/gasolinera','GasolineraController@index',function(Response $response){
    $precios = $response['results'];
    return response()->json([ $precios]);
});

Route::view('/aboutme','aboutme')->name('aboutme');

Route::get('/import_excel','ImportExcelController@index');
Route::post('/import_excel/import','ImportExcelController@import');

Route::get('/precios',function(){

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

            $data['results'][] = $gas;
        }
    }

    return $data;
});
