@extends('layouts.scaffold')

@section('main')

<h1>Show S_q_operplace</h1>

<p>{{ link_to_route('s_q_operplaces.index', 'Return to all s_q_operplaces') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
                    <th>Id</th>
			<th>Name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
                    <td>{{{ $s_q_operplace->id }}}</td>
                    <td>{{{ $s_q_operplace->name }}}</td>
                    <td>{{ link_to_route('s_q_operplaces.edit', 'Edit', array($s_q_operplace->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('s_q_operplaces.destroy', $s_q_operplace->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
