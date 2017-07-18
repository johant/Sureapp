@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Adicionar un Nuevo Usuario
 <small><i class="fa fa-arrow-circle-left"></i><a href="{{ route('users.index') }}"> Regresar a la lista de Usuarios</a></small>
</h1>
@stop
@section('content')
<div class="content">
<form id="frmTicket" class="form-horizontal"" action="{{ route('users.store')}}" method="post" enctype="multipart/form-data" files="true" >
    {{ csrf_field() }}
        <div id="customer-edit" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Información del Usuario</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-info">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group {{ $errors->has('name')  || $errors->has('username') ? 'has-error': ''}}">
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="name" title="">Nombre</label>
                                            <div class="ico-help" title="Nombre del Usuario"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="name" name="name" type="text" value="{{ old('name')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('name', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="username" title="">Usuario</label>
                                            <div class="ico-help" title="username"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="username" name="username" type="text" value="{{ old('username')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('username', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="name" title="">Email</label>
                                            <div class="ico-help" title="Email del Usuario"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="email" name="email" type="text" value="{{ old('email')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('name', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="username" title="">Perfil</label>
                                            <div class="ico-help" title="username"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                            <select class="form-control valid" name="role_id" id="role_id">
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{old('role_id') == $role->id ? 'selected': ''}}>{{ $role->name }}</option>
                                            @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('username', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('quantity') ? 'has-error': ''}}">
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="password" title="">Password</label>
                                            <div class="ico-help" title="Password del Usuario"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="password" name="password" type="password" value="{{ old('password')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('password', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="password_confirmation" title="">Repetir Password</label>
                                            <div class="ico-help" title="password_confirmation"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="password_confirmation" name="password_confirmation" type="password" value="{{ old('password_confirmation')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('rpassword', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                                <button type="submit" name="save" class="btn bg-blue pull-right"><i class="fa fa-floppy-o"></i>Guardar Tipo de Cliente </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop
