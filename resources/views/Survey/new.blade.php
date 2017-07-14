@extends('layout.master')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> Adicionar Encuesta</span>
      <form method="POST" action="create" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="input-field col s12">
            <input name="title" id="title" type="text">
            <label for="title">Titulo de la encuesta</label>
          </div>
          <div class="input-field col s12">
            <textarea name="description" id="description" class="materialize-textarea"></textarea>
            <label for="description">Descripción</label>
          </div>
          <div class="input-field col s12">
            <select class="browser-default" name="client_id" id="client_id">
              <option value="" disabled selected>Seleccione un Tipo de cliente</option>
              @foreach($client_types as $type)
                <option value="{{ $type->id}}" >{{ $type->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-field col s12">
            <select class="browser-default" name="category_id" id="category_id">
              <option value="" disabled selected>Seleccione una Categoria</option>
              @foreach($categories as $category)
                <option value="{{ $category->id}}" >{{ $category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Grabar</button>
          </div>
        </div>
        </form>
    </div>
  </div>
@stop
