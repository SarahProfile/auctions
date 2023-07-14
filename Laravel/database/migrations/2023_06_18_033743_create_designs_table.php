<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDesignsTable extends Migration {

	public function up()
	{
		Schema::create('designs', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('file');
			$table->integer('service_id');
		});
	}

	public function down()
	{
		Schema::drop('designs');
	}
}