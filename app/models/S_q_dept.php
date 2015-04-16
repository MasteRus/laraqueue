<?php

class S_q_dept extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'org_id' => 'required|min:1'
	);
}
