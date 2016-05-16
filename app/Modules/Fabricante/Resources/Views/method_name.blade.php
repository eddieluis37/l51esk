@extends('layouts.master')

@section('head_extra')
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-auto'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('fabricante::general.page.method-name.box-title') }}</h3>
                    &nbsp;

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered" id="MyTable">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Dirección</th>
                            <th class="text-center">Telefono</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fabricantes as $fabricante)
                            <tr>
                                <td class="text-center">{{ $fabricante->id }}</td>
                                <td class="text-center">{{ $fabricante->nombre }}</td>
                                <td class="text-center">{{ $fabricante->direccion }}</td>
                                <td class="text-center">{{ $fabricante->telefono }}</td>

                                {!! Form::open(['route' => ['fabricante.destroy', $fabricante->id], 'method' => 'DELETE']) !!}

                                <td class="text-center">
                                    <button type="submit" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                    <a href="{{ url('/pasteles/'.$fabricante->id.'/edit') }}" class="btn btn-info btn-xs">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a>
                                </td>

                                {!! Form::close() !!}

                            </tr>
                        @endforeach


                    </table>

                </div><!-- /.form-group -->

                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
    @endsection

<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@endsection
