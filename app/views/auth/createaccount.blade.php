@extends('layouts.scaffold')
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

    {{ Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Username')) }}
    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'email')) }}

    {{ Form::label('password', 'Пароль') }}
    {{ Form::password('password', null,array('class' => 'form-control', 'placeholder' => 'Пароль')) }}

    <?php
        $groups = Sentry::findAllGroups();
        $groupsnames=array();
        foreach ($groups as $currentgroup)
        {
            $groupsnames[$currentgroup['id']]=$currentgroup['name'];
        }
        $groups_id_by_user=array();
    ?>
            
    {{Form::label('groups', 'Группы')}}
    {{Form::select('groups',$groupsnames,$groups_id_by_user,array('multiple'=>'multiple','name'=>'groups[]'))}}

    
    {{ Form::submit('Save', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}
</div>
@stop
