@extends('layouts.template')
@section('content')
    <form action="{{route('complete.survey', $survey->id)}}" method="POST">
        {{ csrf_field() }}
        <section class="posts container">
        <?php $a = 0; ?>
        @foreach($survey->questions as $question)
            <article class="post no-image">
                <div class="content-post">
                    <header class="container-flex space-between">
                        <div class="post-category">
                        <?php $a++; ?>
                            <span class="category text-capitalize"><?php echo($a); ?></span>
                        </div>
                    </header>
                    <h3>{{  $question->title }}</h3>
                    <div class="divider"></div>
                    <ul class="list">
                    @foreach($question->option_answers as $answers)
                    <li>
                        <input type="radio" id="{{ $answers->id }}" name="answers[{{ $question->id }}]" value="{{ $answers->id }}" />
                        <label for="{{ $answers->id  }}">{{ $answers->answers }}</label>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </article>
        @endforeach
        </section><!-- fin del div.posts.container -->
            <div class="pagination">
            <ul class="list-unstyled container-flex space-center">
            <li> <button type="submit" class="pagination-active">Finalizar Encuesta</button>
            </li>
            </ul>
    </div>
    </form>
    @stop
