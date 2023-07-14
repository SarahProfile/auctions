<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttemptsTable extends Migration {

	public function up()
	{
		Schema::create('attempts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('mobile');
			$table->string('code');
			$table->tinyInteger('status')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('attempts');
	}
}