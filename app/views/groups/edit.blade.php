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
    <tr>
        <TD>
        {{ Form::label('permissions', 'permissions') }}    
        <?php
        $group1 = Sentry::findGroupById($group->id);
        $perms=array_keys($group1->getPermissions());
        ?>
            
        @foreach ($perms as $perm)
            {{Form::label('permissions[]', $perm) }} 
            {{Form::checkbox('permissions[]', $perm, 'checked' ) }} 
        @endforeach
        
        <?php
         /*
        {{ Form::label('permissions', 'permissions') }}    
        {{ Form::text('permissions', $group->permissions, array('class' => 'form-control', 'placeholder' => 'permissions')) }}

            $permissions = $group->getPermissions();
            if (!array_key_exists('admin', $permissions)) $permissions['admin'] = 0;
            if (!array_key_exists('users', $permissions)) $permissions['users'] = 0;
            ?>
            <div class="form-group">
                <label class="checkbox-inline">
                {{ Form::checkbox('adminPermissions', 1, $permissions['admin'] ) }} Admin
                </label>
                <label class="checkbox-inline">
                {{ Form::checkbox('userPermissions', 1, $permissions['users'] ) }} Users
                </label>
            </div>
        */
        ?>        
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
<!--
        'permissions' => array(
            'user.create' => -1,
            'user.update' => 1,
        ),
-->