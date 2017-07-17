@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Adicionar un nuevo cliente
 <small><i class="fa fa-arrow-circle-left"></i><a href="{{ route('customers.index') }}"> Regresar a la lista de clientes</a></small>
</h1>
@stop
@section('content')
<div class="content">
<form id="frmTicket" class="form-horizontal"" action="{{ route('customer.store')}}" method="post" enctype="multipart/form-data" files="true" onsubmit="return checkForm(this);">
    {{ csrf_field() }}
        <div id="customer-edit" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Información Cliente Principal</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-info">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group {{ $errors->has('name') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="name" title="">Nombre/Razón Social</label>
                                            <div class="ico-help" title="Nombre del Cliente"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="name" name="name" type="text" value="{{ old('name')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('name', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button id="btnPlaza" class="btn btn-default"> <i class="fa fa-long-arrow-right true-icon"></i></button>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('sale') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="sale" title="">Punto de Venta</label>
                                            <div class="ico-help" title="Nombre del Punto de Venta"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="sale" name="sale" type="text" value="{{ old('sale')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('sale', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('address') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="address" title="">Dirección</label>
                                            <div class="ico-help" title="Dirección del cliente"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="address" name="address" type="text" value="{{ old('address')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('address', '<span class="help-block">:message</span>')!!}
                                         </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('contact') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="contact" title="">Contacto</label>
                                            <div class="ico-help" title="Nombre del Contacto "><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="contact" name="contact" type="text" value="{{ old('contact')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('contact', '<span class="help-block">:message</span>')!!}
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
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="phone" title="">Telefono</label>
                                            <div class="ico-help" title="Numero Telefonico Contacto"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="phone" name="phone" type="text" value="{{ old('phone')}}">
                                         </div>
                                    </div>
                                     <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="cell" title="">Celular</label>
                                            <div class="ico-help" title="Numero Celular Contacto"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="cell" name="cell" type="text" value="{{ old('cell')}}">
                                         </div>
                                    </div>
                                </div>
                                <hr>
                               <div class="form-group {{ $errors->has('tipo_cliente_id') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="segmentation_id" title="">Segmentación</label>
                                            <div class="ico-help" title="Ingrese la Segmentación"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <select class="form-control valid" name="segmentation_id" id="segmentation_id">
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($segmentations as $segmentation)
                                                <option value="{{ $segmentation->id }}" {{old('segmentation_id') == $segmentation->id ? 'selected': ''}}>{{ $segmentation->name }}</option>
                                            @endforeach
                                            </select>
                                         </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                        <label class="control-label" for="client_id" title="">Battleground</label>
                                        <div class="ico-help" title="The customer's web."><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="input-group input-group-required">
                                     <select class="form-control valid" name="client_id" id="client_id">
                                        <option value="" disabled selected>Seleccione una Opción</option>
                                        @foreach($client_types as $client_type)
                                            <option value="{{ $client_type->id }}" {{old('client_type_id') == $client_type->id ? 'selected': ''}}>{{ $client_type->name }}</option>
                                        @endforeach
                                        </select>
                                        <div class="input-group-btn">
                                            <span class="required">*</span>
                                        </div>
                                        {!! $errors->first('email', '<span class="help-block">:message</span>')!!}
                                     </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="trade_id" title="">Trade</label>
                                            <div class="ico-help" title="Ingrese el nombre del Trade"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="trade_id" name="trade_id" type="text" value="{{ old('trade_id')}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="focus" title="">Marca Foco</label>
                                            <div class="ico-help" title="Numero Telefonico Contacto"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                            <select class="form-control select2"
                                                name="variants[]"
                                                multiple="multiple"
                                                data-placeholder="Seleccione una o más Etiquetas" style="width: 100%;" >
                                               @foreach ($variants as $variant)
                                                 <option {{ collect(old('variants'))->contains($variant->id) ? 'selected': ''}} value="{{ $variant->id }}">{{ $variant->name }}</option>
                                               @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="area_id" title="">Departamento</label>
                                            <div class="ico-help" title="Nombre de la Zona"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
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
                                         </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="coach_id" title="">Entrenador</label>
                                            <div class="ico-help" title="Ingrese el nombre del Entrenador"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-required">
                                            <select class="form-control valid" name="coach_id" id="coach_id">
                                            <option value="" disabled selected>Seleccione una Opción</option>
{{--                                             @foreach($coaches as $coach)
                                                <option value="{{ $coach->id }}" {{old('coach_id') == $coach->id ? 'selected': ''}}>{{ $coach->name }}</option>
                                            @endforeach --}}
                                            </select>
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                        <label class="control-label" for="observations" title="">Observaciones</label>
                                        <div class="ico-help" title="The customer's web."><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                    <div class="input-group input-group-required">
                                       <input class="form-control text-box single-line" id="observations" name="observations" type="text" value="{{ old('observations')}}">
                                     </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                                <div class="pull-right">
                                <button type="submit" name="save" class="btn bg-blue"><i class="fa fa-floppy-o"></i>Guardar Cliente </button>
                                </div>

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
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
<!-- Select2 -->
<link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
@endpush

@push('scripts')
  <!-- Select2 -->
  <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
  <script>
        $("#btnPlaza").click(function(e){
            e.preventDefault();
            $('#sale').val($('#name').val());
        });
        $('#area_id').on('change', function(e){
            var area_id = e.target.value;
               //ajax area_id
               $.get('/admin/customer/citydropdown?cat+id=' + area_id, function(data){
                   //success data
                   $('#coach_id').empty();
                   $('#coach_id').append('<option value="">Seleccione una Opción</option>');
                   $.each(data, function(index, subcatObj){
                       $('#coach_id').append('<option value=' + subcatObj.id  + '>'
                       + subcatObj.name + '</option>');
                   });
               });
           });
      //Initialize Select2 Elements
      $(".select2").select2();
  </script>

@endpush
