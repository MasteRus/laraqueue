<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnlinerecordExceptions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lara_onlinerecord_exceptions', function($t){
                $t->increments('except_id');
                
                $t->integer('kvant_start')->unsigned();// Maybe need to use BigInt in some cases
                $t->integer('kvant_stop')->unsigned();// Maybe need to use BigInt in some cases
                $t->integer('daynumber')->unsigned();// Maybe need to use BigInt in some cases
                
                $t->integer('plan_id')->unsigned();// Maybe need to use BigInt in some cases
                
                $t->foreign('plan_id')->references('plan_id')->on('lara_onlinerecord_plans');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lara_onlinerecord_exceptions');
	}

}
