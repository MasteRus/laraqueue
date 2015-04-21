@extends('layouts.scaffold')
@section('main')

<h1>All users List</h1>

<p>{{ link_to_route('auth.createaccount', 'Create Account') }}</p>
@if ($users->count())
<table class="table table-striped table-bordered">
    <thead>
    <tr>
    <th>Id</th>
    <th>userName</th>
    <th>email</th>
    <th>Groups</th>
</tr>
</thead>

<tbody>
@foreach ($users as $user)

   <?php
    $userSentry = Sentry::findUserByID($user->id);
    $groups = $userSentry->getGroups();
   ?>

    <tr>
        <td>{{{ $user->id }}}</td>
        <td>{{{ $user->username }}}</td>
        <td>{{{ $user->email }}}</td>
        <td>
            @foreach ($groups as $group)
                {{ link_to_route('groups.show', $group->name, array('id' => $group->id)) }},
            @endforeach
        </td>
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


