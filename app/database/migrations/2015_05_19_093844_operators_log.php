<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class OperatorsLog extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operators_log', function(Blueprint $table) {
			$table->increments('id');
                        $table->integer('user_id')->unsigned()->nullable();
			$table->string('status');
			$table->timestamp('created_on');
                        $table->integer('operplace_id')->unsigned()->nullable();
                        
                        
                        $table->index('user_id');
                        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
                        
                        $table->index('operplace_id');
                        $table->foreign('operplace_id')->references('id')->on('s_q_operplaces')->onDelete('cascade');;
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('operators_log');
	}

}
