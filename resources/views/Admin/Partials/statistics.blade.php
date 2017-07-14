<div class="row">
    <div class="col-md-12">
        <div class="box box-info ">
            <div class="box-header with-border clearfix">
                <div class="box-title">
                    <i class="fa fa-newspaper-o"></i>
                    Informacion de Clientes
                </div>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body" style="display: block;">
                <div class="col-lg-2 col-xs-4">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                        <h3>{{ $customers->count() }}</h3>
                        <p>Clientes Activos</p>
                        </div>
                        <div class="icon">
                        <i class="ion-ios-plus-outline"></i>
                        </div>
                    <a href="{{route('customers.index')}}" class="small-box-footer">
                    Ver Mas
                    <i class="fa fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
                <div class="col-lg-2 col-xs-4">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3>0</h3>
                        <p>Clientes Visitados</p>
                        </div>
                        <div class="icon">
                        <i class="ion-android-checkmark-circle"></i>
                        </div>
                    <a href="" class="small-box-footer">
                    Ver Mas
                    <i class="fa fa-arrow-circle-right"></i>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
