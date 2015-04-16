@extends('layouts.scaffold')
@section('main')

<h1>All users List</h1>
<div>
        {{ Form::model($group, array('method' => 'PATCH', 'route' => array('groups.update', $group->id))) }}
<table class="table table-striped table-bordered">
<tbody>
    <tr>
        <TD>
        {{ Form::label('id', 'id') }}    
        {{ Form::text('id', $group->id, array('class' => 'form-control', 'placeholder' => 'id')) }}
        </TD>
    </tr>
    <tr>
        <TD>
        {{ Form::label('name', 'name') }}    
        {{ Form::text('name', $group->name, array('class' => 'form-control', 'placeholder' => 'name')) }}
        </TD>
    </tr>
    <!--
    <tr>
        <TD>
        {{ Form::label('permissions', 'permissions') }}    
        {{ Form::text('permissions', $group->permissions, array('class' => 'form-control', 'placeholder' => 'permissions')) }}
        </TD>
    </tr>
    -->
    <tr>
        <TD>
            <?php
            // Find the group using the group id
                $group1 = Sentry::findGroupById($group->id);
                //$gPermissions = array_keys($group1->getPermissions());
                $gPermissions = array_keys($group1->getPermissions());
                //Bug:
            ?>
        {{ Form::label('permissions', 'permissions') }}    
        @foreach ($gPermissions as $perm)
            {{ Form::label('permissions[]', $perm) }}
            {{ Form::checkbox('permissions[]', $perm, array('class' => 'form-control', 'placeholder' => 'permissions[]')) }}
        @endforeach
        
        </TD>
    </tr>
    <tr>
        <TD>
        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        </TD>        
    </tr>
</tbody>
</table>
{{ Form::close()}}
</div>
@stop


