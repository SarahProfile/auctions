<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicesTable extends Migration {

	public function up()
	{
		Schema::create('services', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name_ar');
			$table->string('name_en');
			$table->integer('category_id');
			$table->integer('city_id');
			$table->longText('details_ar');
			$table->longText('details_en');
			$table->integer('user_id');
			$table->tinyInteger('is_approved')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('services');
	}
}