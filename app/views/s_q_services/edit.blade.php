@extends('layouts.scaffold')

@section('main')


<h1>Edit S_q_service</h1>
{{ Form::model($s_q_service, array('method' => 'PATCH', 'route' => array('s_q_services.update', $s_q_service->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description') }}
        </li>

        <li>
            {{ Form::label('priority', 'Priority:') }}
            {{ Form::input('number', 'priority') }}
        </li>

        <li>
            
            {{ Form::label('parent_id', 'Parent_id:') }}
                <?php 
                    echo "<select name='parent_id'>";
                    echo "<option selected value=0>--choose organization--</option>";
                    foreach (S_q_service::get(array('id', 'name')) as $s_q_serv) {
                        //$s_q_services[$s_q_serv->id] = $s_q_serv->name;
                        if ($s_q_service->id==$s_q_serv->id)
                            echo "<option selected value=".$s_q_serv->id.">".$s_q_serv->name."</option>";
                        else 
                            echo "<option value=".$s_q_serv->id.">".$s_q_serv->name."</option>";
                        } 

                    echo "</select>";
                ?>
        </li>

        <li>
            {{ Form::label('enabled', 'Enabled:') }}
            {{ Form::checkbox('enabled') }}
        </li>

        <li>
            {{ Form::label('display', 'Display:') }}
            {{ Form::checkbox('display') }}
        </li>

        <li>
            {{ Form::label('inet', 'Inet:') }}
            {{ Form::checkbox('inet') }}
        </li>

        <li>
            {{ Form::label('deleted', 'Deleted:') }}
            {{ Form::checkbox('deleted') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('s_q_services.show', 'Cancel', $s_q_service->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
