@extends('layouts.scaffold')

@section('main')

Pult/index
<!-- Standard button 
    btn-default - white
    btn-primary - Blue
    btn-success - green
    btn-info - light-blue
    btn-warning - orange
    btn-danger - red
-->
{{ HTML::script('https://code.jquery.com/jquery-1.11.3.js') }}
<script type="text/javascript">
    function show() {
        alert("Start");
        var url = $(this).attr('action');
        $.ajax({
            url:"ajaxpultform",
            dataType:'html',
            data: {ajax:true},
            type:'GET',
            success:function(html){
                
                $('#from_ajax').html(html);
            }
        });
        
    }
    setInterval(show , 15000)
</script>
<body onload=" show()">
<div  id="from_ajax" class="col-md-7 col-md-offset-1">
    <button onclick="show();"></button>
</div>
</body>

@stop
