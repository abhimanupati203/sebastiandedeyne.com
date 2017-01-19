@extends('_layouts.master')

@section('title', "{$article->title} — Sebastian De Deyne")
@section('meta', $article->description)

@section('content')
<article class="article">
    <div class="container">
        <header class="article__header">
            <a href="{{ url('/') }}" class="article__header__logotype logotype"></a>
            <h1 class="article__header__title">
                {{ $article->title }}
            </h1>
            @if($article->date)
                <aside class="article__header__meta">
                    Published on {{ $article->date->format('j F Y') }} by Sebastian De Deyne
                    @if($article->era)
                        — <em>{{ $article->era }}</em>
                    @endif
                </aside>
            @endif
        </header>
    </div>
    <div class="container container--narrow">
        <section class="article__body">
            {!! $article->contents !!}
        </section>
        <section class="article__footer">
            <p class="article__footer__credits">© {{ carbon()->format('Y') }} <a href="{{ url('about') }}">Sebastian De Deyne</a> <span class="col:text--lighter fs:12">【ツ】</span></p>
            <div class="article__footer__about">
                <p>
                    I'm a full-stack developer working at <a href="https://spatie.be" target="sebastiandedeyne.com">Spatie</a> in Antwerp, Belgium.
                </p>
                <p>
                    If you've got any comments, feedback or just want to chat you can get in touch via <a href="https://twitter.com/sebdedeyne" target="sebastiandedeyne.com">Twitter</a> or <a href="mailto:sebastiandedeyne@gmail.com">email</a>. If you catch a mistake or notice something that could be improved, feel free to edit this article by <a target="edit" href="https://github.com/sebastiandedeyne/sebastiandedeyne.com/edit/master/content/{{ $article->slug }}.md">sending a PR on GitHub</a>.
                </p>
            </div>
        </section>
    </article>
</main>
@endsection
