<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TerminalLog extends Migration {

	public function up()
	{
            
		Schema::create('terminal_log', function(Blueprint $table) {
			$table->increments('id');
			$table->string('fio');
			$table->string('email');
			$table->datetime('choosed_datetime');
			$table->integer('service_id')->unsigned();
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
		Schema::drop('terminal_log');
	}

}
