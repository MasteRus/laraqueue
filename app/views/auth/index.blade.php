@extends('layouts.scaffold')
@section('main')

<h1>All users List</h1>

@if ($users->count())
<table class="table table-striped table-bordered">
    <thead>
    <tr>
    <th>Name</th>
</tr>
</thead>

<tbody>
@foreach ($users as $user)
    <tr>
        <td>{{{ $user->username }}}</td>
        <td>{{{ $user->email }}}</td>
        <td>{{ link_to_route('auth.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
    </tr>
@endforeach
</tbody>
</table>
@else
	There are no users
@endif
@stop


