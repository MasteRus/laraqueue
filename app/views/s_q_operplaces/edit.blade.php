@extends('layouts.scaffold')

@section('main')

<h1>Edit S_q_operplace</h1>
{{ Form::model($s_q_operplace, array('method' => 'PATCH', 'route' => array('s_q_operplaces.update', $s_q_operplace->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('s_q_operplaces.show', 'Cancel', $s_q_operplace->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
