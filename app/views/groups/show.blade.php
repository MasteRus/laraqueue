@extends('layouts.scaffold')

@section('main')

<h1>Show groups</h1>

<p>{{ link_to_route('groups.index', 'Return to groups') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
        <th>id</th>
        <th>Name</th>
        <th>permissions</th>
    </tr>
    </thead>

	<tbody>
	<tr>
            <TD>{{{ $group->id }}}</TD>
            <TD>{{{ $group->name }}}</TD>
            <TD>
                {{{$group->permissions}}}
            </TD>
            <td>{{ link_to_route('groups.edit', 'Edit', array($group->id), array('class' => 'btn btn-info')) }}</td>
            <td>
            {{ Form::open(array('method' => 'DELETE', 'route' => array('groups.destroy', $group->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
            </td>
        </tr>
    
	</tbody>
</table>

@stop
