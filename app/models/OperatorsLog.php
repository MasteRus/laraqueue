<?php

class OperatorsLog extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
        
        protected $table = 'operators_log';
        public $timestamps = false;
}
