<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnlinerecordDepartments extends Migration {

	public function up()
	{
	    Schema::create('lara_onlinerecord_departments', function($t){
                $t->increments('dept_id');
                $t->string('name', 255);
                $t->integer('org_id')->unsigned();// Maybe need to use BigInt in some cases
                $t->foreign('org_id')->references('org_id')->on('lara_onlinerecord_organizations');
                //$table->integer('user_id')->unsigned();
                //$table->foreign('user_id')->references('id')->on('users');
            });
            
        }

	public function down()
	{

            Schema::drop('lara_onlinerecord_departments');
	}

}
