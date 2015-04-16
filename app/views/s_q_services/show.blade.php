@extends('layouts.scaffold')

@section('main')

<h1>Show S_q_service</h1>

<p>{{ link_to_route('s_q_services.index', 'Return to all s_q_services') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Description</th>
				<th>Priority</th>
				<th>Parent_id</th>
				<th>Enabled</th>
				<th>Display</th>
				<th>Inet</th>
				<th>Deleted</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $s_q_service->name }}}</td>
					<td>{{{ $s_q_service->description }}}</td>
					<td>{{{ $s_q_service->priority }}}</td>
					<td>{{{ $s_q_service->parent_id }}}</td>
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
	</tbody>
</table>

@stop
