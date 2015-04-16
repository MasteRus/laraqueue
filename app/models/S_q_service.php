<?php

class S_q_service extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'description' => 'required',
		'priority' => 'required|min:1',
		'parent_id' => 'min:1',
		'enabled' => '',
		'display' => '',
		'inet' => '',
		'deleted' => ''
	);
}
