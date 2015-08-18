<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class OperatorsLogTable extends Migration {

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
            Schema::table('operators_log', function($table)
            {
                $table->dropForeign('operators_log_service_id_foreign');
                $table->dropForeign('operators_log_s_q_operplaces_id_foreign');
                $table->dropForeign('operators_log_user_id_foreign');
            });
            Schema::drop('operators_log');
	}
}
