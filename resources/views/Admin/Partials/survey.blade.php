
    <div class="tab-pane active" id="tab-info">
        <form id="frmSurvey" class="form-horizontal"" action="{{ route('survey.start', $customer->id )}}" method="post" enctype="multipart/form-data" files="true" >
        {{ csrf_field() }}
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-9">
                            <h4>
                                Para iniciar la encuesta seleccione la categoria a Calificar y haga click en el boton <strong> Iniciar Encuesta. </strong>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group {{ $errors->has('category') ? 'has-error': ''}}">
                        <div class="col-md-3">
                            <div class="label-wrapper">
                                <label class="control-label" for="category_id" title="">Categoria de la encuesta</label>
                                <div class="ico-help" title="Categoria de la encuesta"><i class="fa fa-question-circle"></i></div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="input-group input-group-required">
                                <select class="form-control valid" name="category_id" id="category_id">
                                    <option value="" disabled selected>Seleccione una Opción</option>
                                    @foreach($categories as $categoryt)
                                     <option value="{{ $categoryt->id }}" >{{ $categoryt->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-btn">
                                    <span class="required">*</span>
                                </div>
                                 {!! $errors->first('category', '<span class="help-block">:message</span>')!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cancelar Accion</button>
                    <button type="submit" name="save" class="btn bg-blue pull-right"><i class="fa fa-floppy-o"></i>Iniciar Encuesta</button>
            </div>
        </div>
    </div>
    </form>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="customers-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th>Encuesta</th>
                          <th>Fecha</th>
                          <th>Estado</th>
                          <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($survey_starts as $survey_start)
                      <tr>
                        <td>{{ $survey_start->survey->title }}</td>
                        <td>{{ $survey_start->created_at }}</td>
                        <td>
                        @if($survey_start->status)
                        <i class="fa fa-check true-icon"></i>
                        @else
                        <i class="fa fa-close false-icon"></i>
                        @endif
                        </td>
                        <td style="text-align:center">
                        @if($survey_start->status == 1)
                        <a class="btn btn-success" href="{{ route('survey.close', $survey_start->id) }}""
                        onclick="event.preventDefault();
                        document.getElementById('close-form').submit();><i class="fa fa-lock"></i>Cerrar Encuesta</a>
                          <form id="close-form" action="{{ route('survey.close', $survey_start->id) }}" method="post" style="display: none;">
                              {{ csrf_field() }}     {{ method_field ('PUT') }}
                          </form>
                        @else
                        <a class="btn btn-danger" href=""><i class="fa fa-lock"></i>Encuesta Cerrada</a>
                        @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>


