@extends('layouts.scaffold')

@section('main')

<h1>All S_q_services</h1>

{{$parent['parent_id']}}


@if ($s_q_services->count())
<ul>
    @foreach ($s_q_services as $s_q_service)
        <LI>{{{ $s_q_service->id }}} 
            {{ link_to_route('getterminalindex', $s_q_service->name ,    array($s_q_service->id), array('class' => 'btn btn-info')) }}
        </LI>
        
    @endforeach
</ul>
@else
	
{{ Form::model($s_q_service, array('method' => 'POST', 'route' => array('postterminalindex', $s_q_service->id))) }}

    {{ Form::label('s_q_service_id', $s_q_service->id) }}
    {{ Form::label('name', 'FIO') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'FIO')) }}
    
    {{ Form::label('email', 'email') }}
    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'email')) }}

    {{Form::label('date', 'date')}}
    
    {{/*
        Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date']);
        Form::dateTime('date', null,array('class' => 'form-control', 'placeholder' => 'date'))
        
        
        
        
        */
               /*Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date']);*/
               Form::dateTime('date', null,array('class' => 'form-control', 'placeholder' => 'date'))
    }}
    
    {{ Form::label('service_id', 'service_id:') }}
                <?php
                    $s_q_services = S_q_service::all();
                    echo "<select name='service_id'>";
                    echo "<option selected value=0>--choose service--</option>";
                    foreach ($s_q_services as $s_q_serv) {
                        echo "<option value=".$s_q_serv->id.">".$s_q_serv->name."</option>";
                    } 
                    echo "</select>";
                ?>
    
    {{ Form::submit('Save', array('class' => 'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}



@endif

@stop
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