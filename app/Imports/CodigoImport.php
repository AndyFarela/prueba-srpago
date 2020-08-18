<?php

namespace App\Imports;

use App\Codigo;
use Maatwebsite\Excel\Concerns\ToModel;

class CodigoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $fields = [
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

        foreach ($row as $f) {
            if(in_array($f,$fields)){
                return null;
            }            
        }

        return new Codigo([
                'd_codigo'          => $row[0],
                'd_asenta'          => $row[1],
                'd_tipo_asenta'     => $row[2],
                'D_mnpio'           => $row[3],
                'd_estado'          => $row[4],
                'd_ciudad'          => $row[5],
                'd_CP'              => $row[6],
                'c_estado'          => $row[7],
                'c_oficina'         => $row[8],
                'c_CP'              => $row[9],
                'c_tipo_asenta'     => $row[10],
                'c_mnpio'           => $row[11],
                'id_asenta_cpcons'  => $row[12],
                'd_zona'            => $row[13],
                'c_cve_ciudad'      => $row[14]
        ]);
    }
}
