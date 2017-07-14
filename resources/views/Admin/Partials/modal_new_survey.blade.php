<div id="createsurvey-window" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createsurvey-window-title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="copyproduct-window-title"> Crear Encuesta  </h4>
            </div>
            <form action="{{ route('survey.create') }}" method="post" novalidate="novalidate">
            {{ csrf_field() }}
                <div class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error': ''}}">
                            <div class="col-md-4">
                                <div class="label-wrapper"><label class="control-label" for="title" title="" required>Nombre Encuesta</label>
                                <div class="ico-help" title="The name of the new product."><i class="fa fa-question-circle"></i></div></div>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control text-box single-line" id="title" name="title" type="text" value="{{ old('title')}}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error': ''}}">
                            <div class="col-md-4">
                                <div class="label-wrapper"><label class="control-label" for="description" title="">Descripcion</label>
                                <div class="ico-help" title="The name of the new product."><i class="fa fa-question-circle"></i></div></div>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control text-box single-line" id="description" name="description" type="text" value="{{ old('description')}}">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('client_id') ? 'has-error': ''}}">
                            <div class="col-md-4">
                                <div class="label-wrapper"><label class="control-label" for="client_id" title="">Battleground</label>
                                <div class="ico-help" title="The name of the new product."><i class="fa fa-question-circle"></i></div></div>
                            </div>
                            <div class="col-md-8">
                             <div class="input-group input-group-required">
                                 <select class="form-control valid" name="client_id" id="client_id" required>
                                  <option value="" disabled selected>Seleccione una Categoria</option>
                                  @foreach($client_types as $type)
                                  <option value="{{ $type->id}}" >{{ $type->name}}</option>
                                  @endforeach
                                    </select>
                                 </div>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('category_id') ? 'has-error': ''}}">
                            <div class="col-md-4">
                                <div class="label-wrapper"><label class="control-label" for="category_id" title="">Categoria</label>
                                <div class="ico-help" title="The name of the new product."><i class="fa fa-question-circle"></i></div></div>
                            </div>
                            <div class="col-md-8">
                              <div class="input-group input-group-required">
                                 <select class="form-control valid" name="category_id" id="category_id" required>
                                  <option value="" disabled selected>Seleccione una Categoria</option>
                                  @foreach($categories as $category)
                                    <option value="{{ $category->id}}" >{{ $category->name}}</option>
                                  @endforeach
                                    </select>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Grabar Encuesta
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
