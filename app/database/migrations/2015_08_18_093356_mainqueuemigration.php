<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Mainqueuemigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
public function up()
	{

		Schema::create('MainQueue', function(Blueprint $table) {
                        $table->increments('id');
                        $table->dateTime('datetime');
                        $table->integer('number');
                        $table->string('prefix');
                        $table->string('status');
                        //Created, InQueue%NUMB%, InService, 
                        //Finished, Retranslated, Cancelled
                        
                        $table->integer('service_id')->unsigned()->nullable();
                        $table->foreign('service_id')->references('id')->on('s_q_services')->onDelete('cascade');;
                        
                        $table->integer('s_q_operplaces_id')->unsigned()->nullable();
                        $table->foreign('s_q_operplaces_id')->references('id')->on('s_q_operplaces')->onDelete('cascade');;
                        
                        $table->integer('user_id')->unsigned()->nullable();
                        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
                        
                        $table->dateTime('StartDateTimeProcessing');
                        $table->dateTime('StopDateTimeProcessing');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::table('MainQueue', function($table)
            {
                $table->dropForeign('mainqueue_service_id_foreign');
                $table->dropForeign('mainqueue_s_q_operplaces_id_foreign');
                $table->dropForeign('mainqueue_user_id_foreign');
            });
            Schema::drop('MainQueue');
	}

}
