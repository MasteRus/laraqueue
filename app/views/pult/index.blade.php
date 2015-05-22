@extends('layouts.default')

@section('main')


<td>
{{ Form::open(array('method' => 'post', 'route' => array('s_q_services.destroy', $s_q_service->id))) }}
    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}
</td>

@stop
