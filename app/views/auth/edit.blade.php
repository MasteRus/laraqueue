@extends('layouts.scaffold')
@section('main')

<h1>All users List</h1>

<table class="table table-striped table-bordered">
    <thead>
    <tr>
    <th>Name</th>
</tr>
</thead>

<tbody>
{{$user = Sentry::findUserById($userid);}}

    <tr>
        <td>{{{ $user->id }}}</td>
        <td>{{{ $user->email }}}</td>
       
    </tr>

</tbody>
</table>
@stop


