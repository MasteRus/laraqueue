@extends('layouts.scaffold')

@section('main')

<h1>Show S_q_dept</h1>

<p>{{ link_to_route('s_q_depts.index', 'Return to all s_q_depts') }}</p>
    <?php $s_q_orgs = array(0 => 'Choose company');
    foreach (S_q_org::get(array('id', 'name')) as $s_q_org) {
        
        $s_q_orgs[$s_q_org->id] = $s_q_org->name;
    } ?>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Org_Name</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $s_q_dept->name }}}</td>
			<!--<td>{{{ $s_q_dept->org_id }}}</td>-->
                        <td>{{{ $s_q_orgs[$s_q_dept->org_id] }}}</td>
                        
                    <td>{{ link_to_route('s_q_depts.edit', 'Edit', array($s_q_dept->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('s_q_depts.destroy', $s_q_dept->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
