<div id="answersurvey-window" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="answersurvey-window-title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="copyproduct-window-title"> Crear Encuesta  </h4>
            </div>
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                          <div class="col-md-12">
                            <h4 class="box-title">Respuestas</h4>
                          </div>
                        </div>
                        @if($question->question_type === 'text')
                            <input type="text" class="" name="title" id="title">
                        @elseif($question->question_type === 'textarea')
                            @include('partials.textarea')
                        @elseif($question->question_type === 'radio')
                            @include('admin.partials.radio')
                        @elseif($question->question_type === 'checkbox')
                            @include('partials.checkbox')
                        @endif
                    </div>
                    <div class="panel-footer">
                        <button type="reset" class="btn btn-default" value="Reset"><i class="fa fa-reply"></i> Cerrar</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
