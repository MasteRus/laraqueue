<?php

class MainQueue extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
        
        protected $table = 'MainQueue';
        public $timestamps = false;
        public function service()
        {
          return $this->hasMany('S_q_service','service_id');
        }
}
