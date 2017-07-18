<div id="updatepassword-window" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="updatepassword-window-title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title-password" id="modal-title-password"> Cambiar Contraseña </h4>
            </div>
            <form  id="frmUpdate" action="" method="post" novalidate="novalidate">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group {{ $errors->has('password') ? 'has-error': ''}}">
                            <div class="col-md-4">
                                <div class="label-wrapper"><label class="control-label" for="password" title="">Password</label>
                                <div class="ico-help" title="The name of the new product."><i class="fa fa-question-circle"></i></div></div>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control text-box single-line" id="password" name="password" type="text" required>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('confirm_password') ? 'has-error': ''}}">
                            <div class="col-md-4">
                                <div class="label-wrapper"><label class="control-label" for="confirm_password" title="">Repetir Password</label>
                                <div class="ico-help" title="The name of the new product."><i class="fa fa-question-circle"></i></div></div>
                            </div>
                            <div class="col-md-8">
                              <div class="input-group input-group-required">
                                <input class="form-control text-box single-line" id="confirm_password" name="confirm_password" type="text" required>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Actualizar Contraseña
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
