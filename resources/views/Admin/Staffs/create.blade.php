@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Adicionar un Nuevo Personal
 <small><i class="fa fa-arrow-circle-left"></i><a href="{{ route('customers.index') }}"> Regresar a la lista de Personal</a></small>
</h1>
@stop
@section('content')
<div class="content">
<form id="frmTicket" class="form-horizontal"" action="{{ route('staffs.store', $customer->id )}}" method="post" enctype="multipart/form-data" files="true" >
    {{ csrf_field() }}
        <div id="customer-edit" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Información del Staff</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-info">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="customer" title="">Cliente - Pto. Venta</label>
                                            <div class="ico-help" title="Nombre del Cliente"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                        <label class="form-control text-box single-line" id="customer" name="customer">
                                        {{ $customer->name }} - {{ $customer->sale }}
                                        </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('name') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="name" title="">Nombre</label>
                                            <div class="ico-help" title="Nombre del Personal"><i class="fa fa-question-circle"></i></div></div>
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
                                <div class="form-group ">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="document" title="">Documento</label>
                                            <div class="ico-help" title="Numero de Documento"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="document" name="document" type="text" value="{{ old('document')}}">
                                         <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="document" title="">Email</label>
                                            <div class="ico-help" title="Zona"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                           <input class="form-control text-box single-line" id="email" name="email" type="email" value="{{ old('email')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('email', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                                <button type="submit" name="save" class="btn bg-blue pull-right"><i class="fa fa-floppy-o"></i>Guardar Personal </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop
