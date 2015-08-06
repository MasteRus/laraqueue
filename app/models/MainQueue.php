<?php

class MainQueue extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
        
        protected $table = 'MainQueue';
        public $timestamps = false;
        
}
