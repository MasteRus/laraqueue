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
                $gPermissions = $group1->getPermissions();
                /*
                // TODO: REFACTORING NEEDed!!!!!
                //
                 */
                $s_q_services=array();
                foreach (S_q_service::get(array('id', 'name')) as $s_q_serv) {
                    $s_q_services[$s_q_serv->id] = array($s_q_serv->id, $s_q_serv->name);
                }
                //{"superuser":1}
            ?>
            
        
        {{ Form::label('permissions', 'Permissions') }}
        {{ Form::label('permissions[]', 'Superuser') }}
        @if (array_key_exists('superuser',$gPermissions))
            <input type="checkbox" name="permissions[]" id="superuser" value="superuser" checked>"superuser"              
        @else
            <input type="checkbox" name="permissions[]" id="superuser" value="superuser">"superuser"              
        @endif
        <BR>
        {{ Form::label('permissions[]', 'Service permissions') }}
        @foreach ($s_q_services as $serv)
            
            @if ((array_key_exists($serv[0],$gPermissions))&&($gPermissions[$serv[0]]))
  		<input type="checkbox" name="permissions[]" id="{{$serv[0]}}" value="{{$serv[0]}}" checked>{{$serv[1]}}"
            @else
                <input type="checkbox" name="permissions[]" id="{{$serv[0]}}" value="{{$serv[0]}}">"{{$serv[1]}}"              
            @endif
                <BR>
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


