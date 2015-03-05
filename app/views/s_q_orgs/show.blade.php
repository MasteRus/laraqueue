@extends('layouts.scaffold')

@section('main')

<h1>Show S_q_org</h1>

<p>{{ link_to_route('s_q_orgs.index', 'Return to all s_q_orgs') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $s_q_org->name }}}</td>
                    <td>{{ link_to_route('s_q_orgs.edit', 'Edit', array($s_q_org->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('s_q_orgs.destroy', $s_q_org->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
