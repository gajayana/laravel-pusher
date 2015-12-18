@extends('template')

@section('content')
    <h1>formolir</h1><hr>
    
    {!! Form::open(['url' => 'articles']) !!}
    
    @include('errors.list')
    
    @include('articles._form', ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}
@stop