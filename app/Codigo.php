<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    protected $fillable = [
        'd_codigo',
        'd_asenta',
        'd_tipo_asenta',
        'D_mnpio',
        'd_estado',
        'd_ciudad',
        'd_CP',
        'c_estado',
        'c_oficina',
        'c_CP',
        'c_tipo_asenta',
        'c_mnpio',
        'id_asenta_cpcons',
        'd_zona',
        'c_cve_ciudad'
    ];
    //

    public static function getEdoByCP($cp){
        $estado = Codigo::select('d_estado')->where('d_codigo','=',$cp)->take(1)->get();
        return json_decode($estado->first());
    }

    public static function getCdByCP($cp){
        $ciudad = Codigo::select('d_ciudad')->where('d_codigo','=',$cp)->take(1)->get();
        return json_decode($ciudad->first());
    }
}
