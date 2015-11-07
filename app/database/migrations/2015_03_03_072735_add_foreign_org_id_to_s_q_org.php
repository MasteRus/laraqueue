<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignOrgIdToSQOrg extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            /*
		Schema::table('s_q_orgs', function(Blueprint $table) {
			
		});
             
             */
            Schema::table('s_q_depts', function(Blueprint $table) {
                //$table->index('org_id');
                //$table->foreign('org_id')->references('id')->on('s_q_orgs')->onDelete('cascade');
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            /*
		Schema::table('s_q_orgs', function(Blueprint $table) {
			
		});
             * 
             */
            
            Schema::table('s_q_depts', function(Blueprint $table) {
               // $table->dropForeign('s_q_depts_org_id_foreign');
               // $table->dropIndex('s_q_depts_org_id_index');
            });
	}

}
