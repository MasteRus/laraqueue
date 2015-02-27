@extends('layouts.default')
@section('content')
    <P>edit.blade.php</P>
    <?php
    
    //http://simple-training.com/laravel-todo/laravel-todo-intro/
    //{{ Form::open(array('url'=>'saveOrg', 'method' =>'POST')) }}
    //================================================================
    //IT WORKS
    //{{ Form::open(array('route' => 'edit-org','method' => 'put')) }}
    //================================================================
    //{{ Form::open(array('route' => array('edit-org',$QueueOrganization->org_id),'method' => 'put')) }}
    //{{ Form::open(array('route' => 'edit-org','method' => 'put')) }}
    //{{ Form::model($user, ['action'  => ['UserController@handleEditUser', $user->id], 'role'=> 'form']) }}
    ?>
    @if($orgs)
        
        
        @foreach($orgs as $QueueOrganization)
        {{ Form::open(array('route' => 'edit-org','method' => 'put')) }}
            <table class='table table-striped'>
            <TR>        
                <TD>
                    {{$QueueOrganization->org_id}}
                    {{Form::hidden('org_id', $QueueOrganization->org_id)}}
                </TD>
                <TD>
                    <?php
                    //NeedTOAdd Elements of form
                    ?>
                    {{Form::text('org_name', $QueueOrganization->name)}}
                    
                </TD>
                <TD>
                    {{Form::submit('save');}}
                </TD>    
            </TR>        
            </table>
        @endforeach
        {{ Form::close() }}
    
    @endif
    
    
@stop

