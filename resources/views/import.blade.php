@extends('layout')

@section('content')
    <div class="col-m-12">
        <h1>Importar Excel</h1>
        @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{$e}}</li>
            @endforeach
        </ul>
    @endif

    @if($message = Session::get('success'))
        <strong>{{$message}}</strong>
    @endif
    <form action="{{url('/import_excel/import')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <table>
            <tr>
                <td>
                    <label for="">Selecciona un archivo para subir</label>
                </td>
                <td>
                    <input type="file" name="select_file">
                </td>
                <td>
                    <input type="submit" value="Upload">
                </td>
            </tr>
        </table>

    </form>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
            <div class="static-table-list">
            <table id="table-estados" class="table">
                <thead>
                    <thead>
                        <tr>
                            <th class="text-center">Código Postal</th>
                            <th class="text-center">Asentamiento</th>
                            <th class="text-center">Ciudad</th>
                            <th class="text-center">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{$row->d_codigo}}</td>
                            <td>{{$row->d_asenta}}</td>
                            <td>{{$row->d_ciudad}}</td>
                            <td>{{$row->d_estado}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
        </div>
    </div>    
</div>
@endsection
   