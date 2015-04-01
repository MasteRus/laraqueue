@extends('layouts.scaffold')
@section('main')

<h1>All users List</h1>
<p>{{ link_to_route('groups.create', 'Add new group') }}</p>
@if ($groups->count())
    <table class="table table-striped table-bordered">

    <thead>
        <tr>
        <th>id</th>
        <th>Name</th>
        <th>permissions</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($groups as $group)
        <tr>
            <td>{{{ $group->id }}}</td>
            <td>{{{ $group->name }}}</td>
            <td>{{{ $group->permissions }}}</td>
            <td>{{ link_to_route('groups.edit', 'Edit', array($group->id), array('class' => 'btn btn-info')) }}</td>
            <td>
            {{ Form::open(array('method' => 'DELETE', 'route' => array('groups.destroy', $group->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}
            </td>
        </tr>
    @endforeach
    </tbody>

    </table>
@else
	There are no Groups
@endif
@stop
