@extends('layouts.template')

@section('content')
 <section class="posts container">
    <article class="post no-image">
        <div class="content-post">
            <h4> {{ auth()->user()->name }}</h4>
            {{-- <h4>Cliente: {{ $customer->name}} -- {{ $customer->sale }}</h4> --}}
        </div>
    </article>
        <article class="post no-image">
            <div class="content-post">
                <header class="container-flex space-between">
                    <div class="post-category">

                    </div>
                </header>
                    <h4> Su nota fue</h4>
                    <div class="divider"></div>
                    <ul class="list">
                        @for ($i=0; $i <= $count-1; $i++)
                        <a href="#"><i class="fa fa-star text-yellow btn-lg"></i></a>
                        @endfor
                    </ul>
                    <div class="divider"></div>
                    @if($count == 5)
                    <h4> Felicitaciones!!</h4>
                    @elseif($count == 4)
                    <h4> Muy bueno!!</h4>
                    @elseif($count <= 3)
                    <h4> Debes Repasar!!</h4>
                    @endif
            </div>
            <div>
                <img src="/zendero/img/Bye-smiley.png" alt="">
            </div>
            <p></p>
        </article>
</section>
@stop
@push ('styles')
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/adminlte/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
@endpush
