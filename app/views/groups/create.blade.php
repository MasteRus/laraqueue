@extends('layouts.scaffold')

@section('main')

<h1>Create group</h1>

{{ Form::open(array('route' => 'groups.store')) }}
<table class="table table-striped table-bordered">
<tbody>
    <tr>
        <TD>
        {{ Form::label('name', 'name') }}    
        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'name')) }}
        </TD>
    </tr>
    <tr>

            <!--
        {{ Form::label('permissions', 'permissions') }}    
        {{ Form::text('permissions', null, array('class' => 'form-control', 'placeholder' => 'permissions')) }}
            -->
        <TD>
            <?php
                $s_q_services=array();
                foreach (S_q_service::get(array('id', 'name')) as $s_q_serv) {
                    $s_q_services[$s_q_serv->id] = array($s_q_serv->id, $s_q_serv->name);
                } 
            //{"superuser":1}
            ?>
            {{ Form::label('permissions', 'Permissions') }}
            {{ Form::label('permissions[]', 'Superuser') }}
            <input type="checkbox" name="permissions[]" id="superuser" value="superuser">"superuser"              
            <BR>
            @foreach ($s_q_services as $serv)
                <input type="checkbox" name="permissions[]" id="{{$serv[0]}}" value="{{$serv[0]}}">"{{$serv[1]}}"              
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
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop