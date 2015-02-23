<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnlinerecordPlansServices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('lara_onlinerecord_plans_services', function($t){

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
		Schema::drop('lara_onlinerecord_plans_services');
	}

}
