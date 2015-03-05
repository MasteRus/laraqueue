@extends('layouts.scaffold')

@section('main')

<h1>All S_q_orgs</h1>

<p>{{ link_to_route('s_q_orgs.create', 'Add new s_q_org') }}</p>

@if ($s_q_orgs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($s_q_orgs as $s_q_org)
				<tr>
					<td>{{{ $s_q_org->name }}}</td>
                    <td>{{ link_to_route('s_q_orgs.edit', 'Edit', array($s_q_org->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('s_q_orgs.destroy', $s_q_org->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no s_q_orgs
@endif

@stop
