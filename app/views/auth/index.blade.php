@extends('layouts.scaffold')
@section('main')

<h1>All users List</h1>

<p>{{ link_to_route('auth.createaccount', 'Create Account') }}</p>
@if ($users->count())
<PRE>

</PRE>
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
        <td>{{ link_to_route('auth.edit', 'Edit', array('id' => $user->id), array('class' => 'btn btn-info')) }}</td>
        <td>{{ link_to_route('auth.delete', 'Delete', array('id' => $user->id), array('class' => 'btn btn-danger')) }}</td>
        
    </tr>
@endforeach
</tbody>
</table>
@else
	There are no users
@endif
@stop


