@extends('layouts.scaffold')
@section('main')

<h1>All users List</h1>
<div>
    {{ Form::open(array('method' => 'PATCH', 'action' => array('AuthController@PostEditAccount')  )) }}
    {{ Form::hidden('id', $users->id)}}
<table class="table table-striped table-bordered">
<tbody>
    <tr>
        <TD>
        {{ Form::label('username', 'Username') }}    
        {{ Form::text('username', $users->username, array('class' => 'form-control', 'placeholder' => 'Username')) }}
        </TD>
    </tr>
    <tr>
        <TD>
        {{ Form::label('email', 'email') }}    
        {{ Form::text('email', $users->email, array('class' => 'form-control', 'placeholder' => 'email')) }}
        </TD>
    </tr>
    <tr>
        <TD>
        {{ Form::label('password', 'Пароль') }}
        {{ Form::password('password', null,array('class' => 'form-control', 'placeholder' => 'password')) }}
        </TD>        
    </tr>
    <tr>
        <TD>
        {{Form::label('groups', 'Группы')}}
        {{Form::select('groups',$groups,null,array('multiple'=>'multiple','name'=>'groups[]'))}}
        </TD>        
    </tr>
    <tr>
        <TD>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            
        </TD>        
    </tr>
</tbody>
</table>
{{ Form::close() }}
</div>
@stop


