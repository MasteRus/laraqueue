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
                        $table->foreign('service_id')->references('service_id')->on('onlinerecord_services');

                        $table->timestamps();
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
