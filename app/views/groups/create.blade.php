@extends('layouts.scaffold')

@section('main')

<h1>Create group</h1>

{{ Form::open(array('route' => 'groups.store')) }}
<table class="table table-striped table-bordered">
<tbody>
    <tr>
        <TD>
        {{ Form::label('name', 'name') }}    
        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'name')) }}
        </TD>
    </tr>
    <tr>
        <TD>
        {{ Form::label('permissions', 'permissions') }}    
        {{ Form::text('permissions', null, array('class' => 'form-control', 'placeholder' => 'permissions')) }}
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

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop