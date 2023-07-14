<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequirementsTable extends Migration {

	public function up()
	{
		Schema::create('requirements', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('service_id');
			$table->string('file');
		});
	}

	public function down()
	{
		Schema::drop('requirements');
	}
}