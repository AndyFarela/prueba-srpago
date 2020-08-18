<?php

namespace App\Http\Controllers;

use App\Imports\CodigoImport;
use Illuminate\Http\Request;
use DB;
use Excel;

class ImportExcelController extends Controller
{
    function index() 
    {
        $data = DB::table('codigos')->get();

        return view('import',compact('data'));
    }

    function import(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('select_file')->getRealPath();

        $data = Excel::import(new CodigoImport,$path);

        return back()->with('success','Excel importado con éxtio');
    }
}
