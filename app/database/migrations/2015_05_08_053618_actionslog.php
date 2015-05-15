<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Actionslog extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actionslog', function(Blueprint $table) {
			$table->increments('id');
			$table->string('fio');
			$table->string('email');
			$table->datetime('choosed_datetime');

                        $table->integer('service_id');
                        $table->timestamps();
                        
                        $table->foreign('service_id')->references('id')->on('s_q_services');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actionslog');
	}

}
