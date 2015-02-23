@extends('layouts.default')
@section('content')
    <P>org.blade.php</P>
    
    @if($orgs)
        <table class='table table-striped'>
        @foreach($orgs as $QueueOrganization)
            <TR>        
                <TD>
                    {{ $QueueOrganization->org_id }}
                </TD>
                <TD>
                    {{ $QueueOrganization->name }}
                </TD>
                <TD>
                    <a href="{{URL::action('getOrg',$QueueOrganization->org_id) }}"> Edit </A>

                </TD>
            </TR>        

        @endforeach
        </table>  
    @endif
@stop
