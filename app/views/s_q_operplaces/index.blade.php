@extends('layouts.scaffold')

@section('main')

<h1>All S_q_operplaces</h1>

<p>{{ link_to_route('s_q_operplaces.create', 'Add new s_q_operplace') }}</p>

@if ($s_q_operplaces->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
                                <th>Id</th>
				<th>Name</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($s_q_operplaces as $s_q_operplace)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no s_q_operplaces
@endif

@stop
