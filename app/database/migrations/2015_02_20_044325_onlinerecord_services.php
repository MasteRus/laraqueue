<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnlinerecordServices extends Migration {


	public function up()
	{
	    Schema::create('lara_onlinerecord_services', function($t){
                $t->increments('service_id');
                $t->string('name', 255);
            });
	}

	public function down()
	{
		Schema::drop('lara_onlinerecord_services');
	}
}
