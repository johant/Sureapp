@extends('layouts.template')

@section('content')
 <section class="posts container">
    <article class="post no-image">
        <div class="content-post">
            <h4> Bienvenido  {{ auth()->user()->name }}</h4>
            <h4>Cliente: {{ $customer->name}} -- {{ $customer->sale }}</h4>
        </div>
    </article>
        <article class="post no-image">
            <div class="content-post">
                <header class="container-flex space-between">
                    <div class="post-category">

                    </div>
                </header>
                    <h4> Seleccione una de las encuestas disponibles </h4>
                    <div class="divider"></div>
                    <ul class="list">
                    @forelse($survey_starts as $survey_start)
                    <li>
                    <a class="btn-success" href="{{ url(route('view.survey', ['id'=>$survey_start->survey->id])) }}"><i class="fa fa-hand-o-right"></i> {{ $survey_start->survey->title }}</a>
                    </li>
                        @empty
             <p class="flow-text center-align">No existen encuetas</p>
                    @endforelse
                    </ul>
            </div>
            <p></p>
        </article>
        <h2 class="flow-text">
            {{-- <span style="float:right;"><a href="{{ route('new.survey')}}">Crear nueva encuesta</a></span> --}}
        </h2>
</section>
@stop
