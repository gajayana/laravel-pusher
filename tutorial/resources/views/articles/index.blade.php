@extends('template')

@section('content')
    <h1>Articles</h1>
    
    @foreach ($articles as $article)
        <h2>
            <a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a>
        </h2>
        <p>{{ $article->body }}</p>
    @endforeach
@stop
