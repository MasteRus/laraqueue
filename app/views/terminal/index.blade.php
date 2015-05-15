@extends('layouts.default')

@section('main')

@if ($s_q_services->count())
<h1>Choose Your Service</h1>

<h2>H2={{$parent['parent_id']}}</h2>
<ul>
    @foreach ($s_q_services as $s_q_service)
        <LI>{{{ $s_q_service->id }}} 
            @if ($all_services[$s_q_service->id])
                {{ link_to_route('getterminalindex', $s_q_service->name ,    array($s_q_service->id), array('class' => 'btn btn-info')) }}
            @else
            {{Form::open(array('action' => array('S_q_servicesController@postterminalindex') )) }}
            {{Form::hidden('service_id',$s_q_service->id);}}
            {{Form::submit($s_q_service->name,array('class' => 'btn btn-danger'));}}
            {{Form::close() }}
                
            @endif
        </LI>
        
    @endforeach
</ul>
@else
<h3>Number of choosen={{$parent['parent_id']}}</h3>
	<script>
          /*********************************************************************
           * We print in browser with Enabled Kiosk print function in Kiosk Mode 
           * So after printing we will be redirected to main menu
           * Maybe, we should correct time interval of Refreshing
           ********************************************************************/
	  window.onload = function(){
              print();
              setTimeout(function () {
                  //will redirect to your blog page (an ex: blog.html)
                window.location = "{{URL::to('terminal/index')}}" }, 2000);
	  }
          //TODO: Not Fixed Redirect
        </script>
@endif

@stop
