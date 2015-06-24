@extends('layouts.scaffold')

@section('main')

<h1>All S_q_services</h1>

<p>{{ link_to_route('s_q_services.create', 'Add new s_q_service') }}</p>

@if ($s_q_services->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
                                <th>id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Priority</th>
				<th>Parent_id</th>
				<th>Enabled</th>
				<th>Display</th>
				<th>Inet</th>
				<th>Deleted</th>
                                <th></th>
                                <th></th>
			</tr>
		</thead>

		<tbody>
			@foreach ($s_q_services as $s_q_service)
				<tr>
                                        <td>{{{ $s_q_service->id }}}</td>
					<td>{{{ $s_q_service->name }}}</td>
					<td>{{{ $s_q_service->description }}}</td>
					<td>{{{ $s_q_service->priority }}}</td>
					<td>
                                            {{{ $s_q_service->parent_id }}} 
                                            @if (isset($servnames[$s_q_service->parent_id]))
                                                {{{$servnames[$s_q_service->parent_id]}}}
                                            @endif
                                        </td>
                                            
					<td>{{{ $s_q_service->enabled }}}</td>
					<td>{{{ $s_q_service->display }}}</td>
					<td>{{{ $s_q_service->inet }}}</td>
					<td>{{{ $s_q_service->deleted }}}</td>
                    <td>{{ link_to_route('s_q_services.edit', 'Edit', array($s_q_service->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('s_q_services.destroy', $s_q_service->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no s_q_services
@endif

@stop
