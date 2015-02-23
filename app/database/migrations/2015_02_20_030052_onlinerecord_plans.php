<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnlinerecordPlans extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('lara_onlinerecord_plans', function($t){
                $t->increments('plan_id');
                $t->string('name', 255);
                $t->integer('kvant_value')->unsigned();// Maybe need to use BigInt in some cases
                $t->integer('worktimestart')->unsigned();
                $t->integer('worktimestop')->unsigned();
                $t->integer('dept_id')->unsigned();// Maybe need to use BigInt in some cases
                
                $t->foreign('dept_id')->references('dept_id')->on('lara_onlinerecord_departments');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lara_onlinerecord_plans');
	}

}
