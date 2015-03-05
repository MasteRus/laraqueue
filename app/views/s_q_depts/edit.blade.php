@extends('layouts.scaffold')

@section('main')

<h1>Edit S_q_dept</h1>
{{ Form::model($s_q_dept, array('method' => 'PATCH', 'route' => array('s_q_depts.update', $s_q_dept->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>
        <li>
           {{ Form::label('org_id', 'Organization:') }}
            <?php 
            $s_q_orgs =  array(0 => 'Choose company');
            
            echo "<select name='org_id'>";
            echo "<option selected disabled value=0>--choose organization--</option>";
            foreach (S_q_org::get(array('id', 'name')) as $s_q_org) {
                $s_q_orgs[$s_q_org->id] = $s_q_org->name;
                echo "<option value=".$s_q_org->id.">".$s_q_org->name."</option>";
            } 

            echo "</select>";
            ?>
            
            
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('s_q_depts.show', 'Cancel', $s_q_dept->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
