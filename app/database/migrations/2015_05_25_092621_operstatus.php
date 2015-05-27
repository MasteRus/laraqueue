<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Operstatus extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('operstatus', function(Blueprint $table) {
                        $table->integer('user_id')->unsigned()->nullable();;
                        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;

                        $table->integer('session_id')->unsigned()->nullable();;
                        //$table->foreign('session_id')->references('id')->on('session')->onDelete('cascade');;

                        $table->integer('operplace_id')->unsigned()->nullable();;
                        //$table->foreign('operplace_id')->references('id')->on('s_q_operplaces')->onDelete('cascade');;
                        $table->string('status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('operstatus');
	}

}
