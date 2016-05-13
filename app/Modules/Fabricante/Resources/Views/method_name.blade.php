@extends('layouts.master')

@section('head_extra')
@endsection

@section('content')
    <div class='row'>
        <div class='col-md-3'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('fabricante::general.page.method-name.box-title') }}</h3>
                    &nbsp;

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre', ['for' => 'nombre'] ) !!}
                        {!! Form::text('nombre', null , ['class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Escribe el nombre del pastel...' ]  ) !!}
                    </div><!-- /.form-group -->

                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->

    </div><!-- /.row -->
    @endsection

<!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@endsection
