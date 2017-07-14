@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Respuesta Correcta
 <small><i class="fa fa-arrow-circle-left"></i><a href="{{ route('surveys.index') }}"> Regresar a la lista de Preguntas</a></small>
</h1>
@stop
@section('content')
<div class="content">
<form id="frmTicket" class="form-horizontal"" action="{{ route('question.correct', $question->id)}}" method="post" enctype="multipart/form-data" files="true" >
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <div id="customer-edit" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Pregunta</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-info">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                  <div class="col-md-12">
                                    <h4 class="box-title">Seleccione la Respuesta Correcta</h4>
                                  </div>
                                </div>
                                <form action="">
                                @if($question->question_type === 'text')
                                    <input type="text" class="" name="title" id="title">
                                @elseif($question->question_type === 'textarea')
                                    @include('partials.textarea')
                                @elseif($question->question_type === 'radio')
                                    @include('admin.partials.radio')
                                @elseif($question->question_type === 'checkbox')
                                    @include('partials.checkbox')
                                @endif
                                </form>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                                <button type="submit" name="save" class="btn bg-blue pull-right"><i class="fa fa-floppy-o"></i>Guardar Respuesta</button>
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
<style>
.list li{position:relative;padding-bottom:15px}
  ul{margin:0;padding:0;list-style:none;}
</style>
<link href="/adminlte/plugins/iCheck/square/blue.css" rel="stylesheet">
@endpush
@push('scripts')
<!-- iCheck 1.0.1 -->
  <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
$(document).ready(function() {
      $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
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
