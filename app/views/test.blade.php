<?php
$operplace=  S_q_operplace::select('operplace_id')->where('user_id','=',1);
//$result55=DB::select('Select operplace_id from operstatus where user_id=?',array(1))->get(); 
$result55=DB::table('operstatus')->select('operplace_id')->where('user_id','=',1)->first(); 
echo "<PRE>";
var_dump($result55);
echo "</PRE>";
?>

@section('main')

    <P>{{}}</P>

@stop