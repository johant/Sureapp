@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Adicionar una nueva Variante
 <small><i class="fa fa-arrow-circle-left"></i><a href="{{ route('variants.index') }}"> Regresar a la lista de Variantes</a></small>
</h1>
@stop
@section('content')
<div class="content">
<form id="frmTicket" class="form-horizontal"" action="{{ route('variants.store')}}" method="post" enctype="multipart/form-data" files="true" >
    {{ csrf_field() }}
        <div id="customer-edit" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Información de la Variante</a></li>
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
                                            <div class="ico-help" title="Nombre de la Variante"><i class="fa fa-question-circle"></i></div></div>
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
                                <div class="form-group {{ $errors->has('description') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="description" title="">Descripcion</label>
                                            <div class="ico-help" title="Descripción de la Variante"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="description" name="description" type="text" value="{{ old('description')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('description', '<span class="help-block">:message</span>')!!}
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('brand_id') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="description" title="">Marca</label>
                                            <div class="ico-help" title="Descripción de la Marca"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                         <select class="form-control valid" name="brand_id" id="brand_id">
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" {{old('brand_id') == $brand->id ? 'selected': ''}}>{{ $brand->name }}</option>
                                            @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('brand_id', '<span class="help-block">:message</span>')!!}
                                         </div>
                                    </div>
                                </div>
                                 <div class="form-group {{ $errors->has('segmentation_id') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="segmentation_id" title="">Segmentacion</label>
                                            <div class="ico-help" title="Descripción de la Segmentación"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                         <select class="form-control valid" name="segmentation_id" id="segmentation_id">
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($segmentations as $segmentation)
                                                <option value="{{ $segmentation->id }}" {{old('segmentation_id') == $segmentation->id ? 'selected': ''}}>{{ $segmentation->name }}</option>
                                            @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('segmentation_id', '<span class="help-block">:message</span>')!!}
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                                <button type="submit" name="save" class="btn bg-blue pull-right"><i class="fa fa-floppy-o"></i>Guardar Variante </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop
