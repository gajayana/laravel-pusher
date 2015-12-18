@extends('template')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->body }}</p>
@stop