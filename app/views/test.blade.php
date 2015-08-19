@extends('layouts.scaffold')

@section('main')

    <P>TEST
        <?php
        $user = Sentry::getUser();


        
        $arraytest1["0"]=0;
        $arraytest1["superuser"]=1;
        $arraytest1["2"]=1;
        $arraytest1["5"]=1;
        $arraytest1["6"]=1;
        $arraytest1["1"]=0;
        $arraytest1["3"]=0;
        $arraytest1["4"]=0;
        $arraytest1["7"]=0;
        $arraytest1["8"]=0;
        $arraytest1["9"]=0;
  
        $arraytest2=$arraytest1;
        ksort($arraytest2);
        ?></P>

    <p>$array1=={{var_dump($arraytest1)}}</p>
    <p>$array1Result=={{var_dump($arraytest2)}}</p>


    
    
@stop