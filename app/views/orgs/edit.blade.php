@extends('layouts.default')
@section('content')
    <P>edit.blade.php</P>
    <?php
    //editOrgSave($org_id, $orgname)
    //$fruits = array (
    //"fruits"  => array("a" => "orange", "b" => "banana", "c" => "apple"),
    //"numbers" => array(1, 2, 3, 4, 5, 6),
    //"holes"   => array("first", 5 => "second", "third")
    //);
    

    //{{ Form::open(array('action' => 'OrgController@editOrgSave')) }}
    //{{ Form::open(array('url'=>'orgs', 'method' =>'PUT')) }};
    //{{ Form::close() }}
    //{{Form::submit('save');}}
    
    //http://simple-training.com/laravel-todo/laravel-todo-intro/
    ?>
    @if($orgs)
    
        @foreach($orgs as $QueueOrganization)
            {{ Form::open() }}
            <table class='table table-striped'>
            <TR>        
                <TD>
                    {{$QueueOrganization->org_id}}
                    
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
            {{ Form::close() }}
        @endforeach
        
    
    @endif
    
    
@stop

