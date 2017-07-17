@extends('Layouts.master')
@section('header')
<h1 class="pull-left">
 Editar Cliente {{ $customer->sale }}
 <small><i class="fa fa-arrow-circle-left"></i><a href="{{ route('customers.index') }}"> Regresar a la lista de clientes</a></small>
</h1>
@stop
@section('content')
<div class="content">
        <div id="customer-edit" class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a data-tab-name="tab-info" data-toggle="tab" href="#tab-info">Información Cliente Principal</a></li>
                <li class=""><a data-tab-name="tab-staff" data-toggle="tab" href="#tab-staff">Información Staff</a></li>
                <li class=""><a data-tab-name="tab-event" data-toggle="tab" href="#tab-event">Información Evento</a></li>
                <li class=""><a data-tab-name="tab-survey" data-toggle="tab" href="#tab-survey">Generar Encuesta</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-info">
                <form id="frmTicket" class="form-horizontal"" action="{{ route('customer.update', $customer->id )}}" method="post" enctype="multipart/form-data" files="true" onsubmit="return checkForm(this);">
                    {{ csrf_field() }} {{ method_field ('PUT') }}
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group {{ $errors->has('name') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="name" title="">Nombre/Razón Social</label>
                                            <div class="ico-help" title="Nombre del Cliente"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="name" name="name" type="text" value="{{ old('name', $customer->name)}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('name', '<span class="help-block">:message</span>')!!}
                                        </div>
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
                                            <input class="form-control text-box single-line" id="sale" name="sale" type="text" value="{{ old('sale', $customer->sale)}}">
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
                                            <input class="form-control text-box single-line" id="address" name="address" type="text" value="{{ old('address', $customer->address)}}">
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
                                            <input class="form-control text-box single-line" id="contact" name="contact" type="text" value="{{ old('contact', $customer->contact )}}">
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
                                       <input class="form-control text-box single-line" id="email" name="email" type="email" value="{{ old('email', $customer->email )}}">
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
                                            <input class="form-control text-box single-line" id="phone" name="phone" type="text" value="{{ old('phone', $customer->phone ) }}">
                                         </div>
                                    </div>
                                     <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="cell" title="">Celular</label>
                                            <div class="ico-help" title="Numero Celular Contacto"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="cell" name="cell" type="text" value="{{ old('cell', $customer->cell )}}">
                                         </div>
                                    </div>
                                </div>
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
                                                <option value="{{ $segmentation->id }}" {{old('segmentation_id', $customer->segmentation_id ) == $segmentation->id ? 'selected': ''}}>{{ $segmentation->name }}</option>
                                            @endforeach
                                            </select>
                                         </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                        <label class="control-label" for="web" title="">Battleground</label>
                                        <div class="ico-help" title="The customer's web."><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="input-group input-group-required">
                                     <select class="form-control valid" name="client_id" id="client_id">
                                        <option value="" disabled selected>Seleccione una Opción</option>
                                        @foreach($client_types as $client_type)
                                            <option value="{{ $client_type->id }}" {{old('client_id', $customer->client_id ) == $client_type->id ? 'selected': ''}}>{{ $client_type->name }}</option>
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
                                            <input class="form-control text-box single-line" id="trade_id" name="trade_id" type="text" value="{{ old('trade_id',  $customer->trade_id )}}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="focus" title="">Marca Foco</label>
                                            <div class="ico-help" title="Numero Telefonico Contacto"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <select class="form-control select2"
                                                name="variants[]"
                                                multiple="multiple"
                                                data-placeholder="Seleccione una o más Etiquetas" style="width: 100%;" >
                                               @foreach ($variants as $variant)
                                                 <option {{ collect(old('variants', $customer->variants->pluck('id')))->contains($variant->id) ? 'selected': ''}} value="{{ $variant->id }}">{{ $variant->name }}</option>
                                               @endforeach
                                       </select>
                                            <div class="input-group-btn">
                                                <span class="required"></span>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="area_id" title="">Zona</label>
                                            <div class="ico-help" title="Nombre de la Zona"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <select class="form-control valid" name="area_id" id="area_id">
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($areas as $area)
                                                <option value="{{ $area->id }}" {{old('area_id', $customer->area_id ) == $area->id ? 'selected': ''}}>{{ $area->name }}</option>
                                            @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="coach_id" title="">Entrenador</label>
                                            <div class="ico-help" title="Ingrese el nombre del Entrenador"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <select class="form-control valid" name="coach_id" id="coach_id">
                                            <option value="" disabled selected>Seleccione una Opción</option>
                                            @foreach($coaches as $coach)
                                             <option value="{{ $coach->id }}" {{old('coach_id', $customer->coach_id ) == $coach->id ? 'selected': ''}}>{{ $coach->name }}</option>
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
                                        <label class="control-label" for="observations" title="">Observaciones</label>
                                        <div class="ico-help" title="The customer's web."><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                    <div class="input-group input-group-required">
                                       <input class="form-control text-box single-line" id="observations" name="observations" type="text" value="{{ old('observations', $customer->observations)}}">
                                     </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                                 <div class="pull-right">
                                 <button type="submit" name="save" class="btn bg-blue"><i class="fa fa-floppy-o"></i>Guardar Cliente </button>
                                <button type="button" name="copycustomer" class="btn bg-olive" data-toggle="modal" data-target="#copyproduct-window"><i class="fa fa-copy"></i>Copiar Cliente </button>
                                </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="tab-pane" id="tab-staff">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                  <div class="pull-right">
                                     <a href="{{ route( 'staffs.create', $customer->id )}}" class="btn bg-blue">
                                            <i class="fa fa-plus-square"></i>
                                           Adicionar Staff
                                        </a>
                                    </div>
                                </h4>
                             </div>
                            <div class="panel-body">
                            @include('Admin.Partials.staff')
                            </div>
                        </div>
                    </div>
            </div>
            <div class="tab-pane" id="tab-event">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        @include('Admin.Partials.event')
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-survey">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-body">
                        @include('Admin.Partials.survey')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

<div id="copyproduct-window" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="copyproduct-window-title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="copyproduct-window-title">Copiar Cliente <strong>{{ $customer->name }}</strong> </h4>
            </div>
            <form action="{{ route('customer.copy', $customer->id )}}" method="post" novalidate="novalidate">
            {{ csrf_field() }} {{ method_field ('PUT') }}
                <div class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="label-wrapper"><label class="control-label" for="CopyCustomerName" title="">Nuevo Punto de Venta</label>
                                <div class="ico-help" title="The name of the new product."><i class="fa fa-question-circle"></i></div></div>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control text-box single-line" id="CopyCustomerName" name="CopyCustomerName" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="label-wrapper"><label class="control-label" for="CopyCustomerAddress" title="">Nueva Direccion</label>
                                <div class="ico-help" title="The name of the new product."><i class="fa fa-question-circle"></i></div></div>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control text-box single-line" id="CopyCustomerAddress" name="CopyCustomerAddress" type="text" >
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Copiar Cliente
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush
