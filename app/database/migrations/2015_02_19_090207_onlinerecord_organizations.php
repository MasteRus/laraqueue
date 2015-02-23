<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnlinerecordOrganizations extends Migration {

    public function up()
	{
	    Schema::create('lara_onlinerecord_organizations', function($t){
                $t->increments('org_id');
                $t->string('name', 255);
            });
   
    }

	public function down()
	{
            Schema::drop('lara_onlinerecord_organizations');
 	}

}
