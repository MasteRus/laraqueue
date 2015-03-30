@extends('layouts.scaffold')

@section('main')

<h1>Edit S_q_org</h1>
{{ Form::model($s_q_org, array('method' => 'PATCH', 'route' => array('s_q_orgs.update', $s_q_org->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>
        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('s_q_orgs.show', 'Cancel', $s_q_org->id, array('class' => 'btn')) }}
        </li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
