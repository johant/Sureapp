@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Adicionar una nueva Segmentacion
 <small><i class="fa fa-arrow-circle-left"></i><a href="{{ route('segmentations.index') }}"> Regresar a la lista de Segmentaciones</a></small>
</h1>
@stop
@section('content')
<div class="content">
<form id="frmTicket" class="form-horizontal"" action="{{ route('segmentations.store')}}" method="post" enctype="multipart/form-data" files="true" >
    {{ csrf_field() }}
        <div id="customer-edit" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Información de la Segmentacion</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-info">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group {{ $errors->has('name') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="name" title="">Nombre</label>
                                            <div class="ico-help" title="Nombre de la Segmentacion"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="name" name="name" type="text" value="{{ old('name')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('name', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="description" title="">Descripción</label>
                                            <div class="ico-help" title="Descripción de la Segmentacion"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="description" name="description" type="text" value="{{ old('description')}}">
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('type') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="type  " title="">Tipo Segmentación</label>
                                            <div class="ico-help" title="Tipo de Segmentación"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                        <select name="type" id="type" class="form-control valid" >
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            <option value="Licores">Licores</option>
                                            <option value="Clientes">Clientes</option>
                                        </select>
                                        {!! $errors->first('type', '<span class="help-block">:message</span>')!!}
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                                <button type="submit" name="save" class="btn bg-blue pull-right"><i class="fa fa-floppy-o"></i>Guardar Segmentación </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop
