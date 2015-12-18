@extends('template')

@section('content')
    <h1>formolir edid: {!! $article->title !!}</h1><hr>
    
    {!! Form::model($article, [
        'method' => 'PATCH', 
        'action' => ['ArticlesController@update', $article->id]
    ]) !!}
    
    @include('errors.list');
    
    @include('articles._form', ['submitButtonText' => 'Update Article'])
    {!! Form::close() !!}
@stop