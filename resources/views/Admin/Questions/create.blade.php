@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Adicionar Preguntas a <strong>{{ $survey->title}}</strong>
 <small><i class="fa fa-arrow-circle-left"></i><a href="{{ route('surveys.index') }}"> Regresar a la lista de Encuestas</a></small>
</h1>
@stop
@section('content')
<div class="content">
<form id="frmTicket" class="form-horizontal"" action="{{ route('question.create', $survey->id)}}" method="post" enctype="multipart/form-data" files="true" >
    {{ csrf_field() }}
        <div id="customer-edit" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Preguntas</a></li>
                <li class=""><a data-tab-name="tab-list" data-toggle="tab" href="#tab-list">Lista de Preguntas</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-info">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="name" title="">Titulo</label>
                                            <div class="ico-help" title="Nombre del Tipo Cliente"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                             <label class="form-control text-box single-line" for="name" title="">{{ $survey->title}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="description" title="">Descripción</label>
                                            <div class="ico-help" title="Descripción del Tipo Cliente"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                            <label class="form-control text-box single-line" for="name" title="">{{ $survey->description}}</label>
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="quantity" title="">Battleground</label>
                                            <div class="ico-help" title="Numero de Capacitaciones"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <label class="form-control text-box single-line" for="name" title="">{{ $survey->client->name}}</label>
                                         </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="quantity" title="">Categoria</label>
                                            <div class="ico-help" title="Numero de Capacitaciones"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <label class="form-control text-box single-line" for="name" title="">{{ $survey->category->name}}</label>
                                         </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group {{ $errors->has('title') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="title" title="">Pregunta</label>
                                            <div class="ico-help" title="Nombre de la Area"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="title" name="title" type="text" value="{{ old('title')}}">
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
                                            <label class="control-label" for="quantity" title="">Tipo Pregunta</label>
                                            <div class="ico-help" title="Numero de Capacitaciones"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="input-group input-group-required">
                                            <select class="form-control valid" name="question_type" id="question_type">
                                                <option value="" disabled selected>Seleccione Tipo Pregunta</option>
                                                {{--               <option value="text">Text</option>
                                                <option value="textarea">Textarea</option> --}}
                                                <option value="checkbox">Seleccion Multiple</option>
                                                <option value="radio">Seleccion Unica</option>
                                            </select>
                                         </div>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="add-option help-block btn btn-primary" style="cursor:pointer;">
                                            <i class="fa  fa-plus-square"></i>Adicionar Rta.
                                        </span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <!-- this part will be chewed by script in init.js -->
                                    <span class="form-g"></span>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                                <button type="submit" name="save" class="btn bg-blue pull-right"><i class="fa fa-floppy-o"></i>Guardar Tipo de Cliente </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-list">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        @include('Admin.Partials.question_list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@stop
@push('styles')
{{-- <style>
.list li{position:relative;padding-bottom:15px}
  ul{margin:0;padding:0;list-style:none;}
</style> --}}
{{-- <link href="/adminlte/plugins/iCheck/square/blue.css" rel="stylesheet"> --}}
@endpush
@push('scripts')
<!-- iCheck 1.0.1 -->
  {{-- <script src="/adminlte/plugins/iCheck/icheck.min.js"></script> --}}
<script>

{{-- @include('Admin.partials.modal_answer_survey') --}}

$(document).ready(function() {


      // will replace .form-g class when referenced
      // <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">
      //             <span class="help-block">Help block with success</span>
  var material = '<div class="form-group"><div class="col-md-3">' +
    '<div class="label-wrapper"><label class="control-label" for="quantity" title="">Respuesta</label></div></div>' +
    '<div class="col-md-7"><div class="input-group input-group-required">' +
    '<input class="form-control text-box single-line" name="answers[]" id="answers[]" type="text""></div></div>' +
    '<div class="col-md-2"><span style="cursor:pointer;"class="delete-option btn btn-danger">' +
    '<i class="fa   fa-minus-square"></i> Eliminar Rta </span></div></div>' ;


    // '<span style="float:right; cursor:pointer;"class="delete-option">Eliminar</span>' +
    // '<label for="option_name">Opciones</label>' +
    // '<span class="add-option" style="cursor:pointer;">Adicionar Pregunta</span>' +
    // '</div>';

  // for adding new option
  $(document).on('click', '.add-option', function() {
    $(".form-g").append(material);
  });

    // allow for more options if radio or checkbox is enabled
  $(document).on('change', '#question_type', function() {
    var selected_option = $('#question_type :selected').val();
    if (selected_option === "radio" || selected_option === "checkbox") {
      $(".form-g").html(material);
    } else {
      $(".input-g").remove();
    }
  });
    });
</script>
@endpush
