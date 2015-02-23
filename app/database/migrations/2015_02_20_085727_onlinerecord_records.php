<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnlinerecordRecords extends Migration {

	public function up()
	{
            Schema::create('lara_onlinerecord_records', function($t){
                $t->increments('record_id');
                //$t->date('recorddate');
                $t->string('name',1024);// Maybe need to use BigInt in some cases
                //$t->date('birthdate');// Maybe need to use BigInt in some cases
                $t->integer('daynumber')->unsigned();// Maybe need to use BigInt in some cases
                
                $t->integer('service_id')->unsigned();// Maybe need to use BigInt in some cases
                $t->foreign('service_id')->references('service_id')->on('lara_onlinerecord_services');
                
                $t->integer('plan_id')->unsigned();// Maybe need to use BigInt in some cases
                $t->foreign('plan_id')->references('plan_id')->on('lara_onlinerecord_plans');
            });	//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lara_onlinerecord_records');
	}


}
