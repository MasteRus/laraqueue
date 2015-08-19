<?php

class OperStatus extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
        
        protected $table = 'operstatus';
        public $timestamps = false;
        
        protected $primaryKey = null;

    
        public $incrementing = false;
}
