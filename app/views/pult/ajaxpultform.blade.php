{{ Form::label('USER',Sentry::getUser()->id)}}


{{ Form::open(array('route' => 'FinishServing')) }}
{{ Form::hidden('userid', Sentry::getUser()->id)}}
{{ Form::submit('FinishServing', array('class' => 'btn btn-primary', 'value'=>'FinishServing')) }}
{{ Form::close() }}

{{ Form::open(array('route' => 'callNextVisiter')) }}
{{ Form::hidden('userid', Sentry::getUser()->id)}}
{{ Form::submit('callNextVisiter', array('class' => 'btn btn-success', 'value'=>'callNextVisiter')) }}
{{ Form::close() }}

{{ Form::open(array('route' => 'StartPause')) }}
{{ Form::hidden('operplace_id', 0)}}
{{ Form::submit('StartPause', array('class' => 'btn btn-warning', 'value'=>'StartPause')) }}
{{ Form::close() }}

{{ Form::open(array('route' => 'StopPause')) }}
{{ Form::hidden('operplace_id', 0)}}
{{ Form::submit('StopPause', array('class' => 'btn btn-warning', 'value'=>'StopPause')) }}
{{ Form::close() }}
       
      
{{ Form::open(array('route' => 'RedirectVisiterTo')) }}
{{ Form::hidden('operplace_id', 0)}}
{{ Form::submit('RedirectVisiterTo', array('class' => 'btn btn-warning', 'value'=>'StopPause')) }}
{{ Form::close() }}

{{ Form::open(array('route' => 'GetNextUserBeforeChoosen')) }}
{{ Form::hidden('operplace_id', 0)}}
{{ Form::submit('GetNextUserBeforeChoosen', array('class' => 'btn btn-warning', 'value'=>'GetNextUserBeforeChoosen')) }}
{{ Form::close() }}

{{ Form::open(array('route' => 'ExitPult')) }}
{{ Form::hidden('operplace_id', 0)}}
{{ Form::submit('ExitPult', array('class' => 'btn btn-danger', 'value'=>'ExitPult')) }}
{{ Form::close() }}