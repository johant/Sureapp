@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Adicionar un Nuevo Entrenador
 <small><i class="fa fa-arrow-circle-left"></i><a href="{{ route('coaches.index') }}"> Regresar a la lista de Entrenadores</a></small>
</h1>
@stop
@section('content')
<div class="content">
<form id="frmTicket" class="form-horizontal"" action="{{ route('coaches.store')}}" method="post" enctype="multipart/form-data" files="true" >
    {{ csrf_field() }}
        <div id="customer-edit" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Información del Entrenador</a></li>
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
                                            <div class="ico-help" title="Nombre del Entrenador"><i class="fa fa-question-circle"></i></div></div>
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
                                         </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="document" title="">Zona</label>
                                            <div class="ico-help" title="Zona"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                            <div class="input-group input-group-required">
                                         <select class="form-control valid" name="area_id" id="area_id">
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($areas as $area)
                                                <option value="{{ $area->id }}" {{old('area_id') == $area->id ? 'selected': ''}}>{{ $area->name }}</option>
                                            @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('area_id', '<span class="help-block">:message</span>')!!}
                                         </div>
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                        <label class="control-label" for="Email" title="">Email</label>
                                        <div class="ico-help" title="The customer's email."><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                    <div class="input-group input-group-required">
                                       <input class="form-control text-box single-line" id="email" name="email" type="email" value="{{ old('email')}}">
                                        <div class="input-group-btn">
                                            <span class="required">*</span>
                                        </div>
                                         {!! $errors->first('email', '<span class="help-block">:message</span>')!!}
                                     </div>
                                    </div>
                                </div>
                                  <div class="form-group ">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="password" title="">Contraseña</label>
                                            <div class="ico-help" title="Contraseña"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="password" name="password" type="password" value="{{ old('document')}}">
                                           <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="rpassword" title="">Repetir Contraseña</label>
                                            <div class="ico-help" title="Repetir Password"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="rpassword" name="rpassword" type="password" value="{{ old('document')}}">
                                           <div class="input-group-btn">
                                            <span class="required">*</span>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                                <button type="submit" name="save" class="btn bg-blue pull-right"><i class="fa fa-floppy-o"></i>Guardar Entrenador </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop
