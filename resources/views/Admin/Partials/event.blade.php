    <form id="frmSchudel" class="form-horizontal"" action="{{ route('schudel.store', $customer->id )}}" method="post" enctype="multipart/form-data" files="true" >
        {{ csrf_field() }}
                <div class="tab-pane active" id="tab-info">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group {{ $errors->has('started_at') ? 'has-error': ''}}">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="started_at" title="">Fecha</label>
                                            <div class="ico-help" title="Fecha Inicio Evento"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="started_at" name="started_at" type="date" value="{{ $today->format('d/m/Y') }}">
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('started_at', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="time_at" title="">Seguimiento</label>
                                            <div class="ico-help" title="Hora Inicio Evento"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group input-group-required">
                                            <select class="form-control valid" name="followup_option_id" id="followup_option_id">
                                                <option value="" disabled selected>Seleccione una Opción</option>
                                                @foreach($followup_options as $followup_option)
                                                 <option value="{{ $followup_option->id }}" >{{ $followup_option->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-btn">
                                                <span class="required">*</span>
                                            </div>
                                             {!! $errors->first('time_at', '<span class="help-block">:message</span>')!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <div class="label-wrapper">
                                            <label class="control-label" for="observations" title="">Observaciones</label>
                                            <div class="ico-help" title="Observaciones"><i class="fa fa-question-circle"></i></div></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="input-group input-group-required">
                                            <input class="form-control text-box single-line" id="observations" name="observations" type="text" value="{{ old('observations')}}">
                                            {{--  {!! $errors->first('description', '<span class="help-block">:message</span>')!!} --}}
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                                <button type="submit" name="save" class="btn bg-blue pull-right"><i class="fa fa-floppy-o"></i>Guardar Evento </button>
                        </div>
                    </div>
                </div>
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table id="customers-table" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                      <th>Fecha</th>
                                      <th>Seguimiento</th>
                                      <th>Observaciones</th>
                                      <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($schedules as $schedule)
                                  <tr>
                                    <td>{{ $schedule->started_at }}</td>
                                    <td>{{ $schedule->followup_option->name }}</td>
                                    <td>{{ $schedule->observations }}</td>
                                    <td style="text-align:center">
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
</form>
