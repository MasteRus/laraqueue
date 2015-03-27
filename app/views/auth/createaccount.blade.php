@extends('layout')
@section('main')
<div class="container">
{{ Form::open(array('class' => 'form-signin')) }}

    @if (!$errors->isEmpty())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    <h2 class="form-signin-heading">{{ $title }}</h2>

    {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'ФИО')) }}
    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Логин')) }}
    {{ Form::label('password', 'Пароль') }}
    {{ Form::password('password', null,array('class' => 'form-control', 'placeholder' => 'Пароль')) }}

    {{ Form::submit('Save', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}
</div>
@stop
