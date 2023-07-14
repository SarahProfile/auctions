<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('service_id');
			$table->integer('user_id');
			$table->string('comment');
		});
	}

	public function down()
	{
		Schema::drop('offers');
	}
}