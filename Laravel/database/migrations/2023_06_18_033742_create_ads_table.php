<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsTable extends Migration {

	public function up()
	{
		Schema::create('ads', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('category_id');
			$table->string('name_ar');
			$table->string('name_en');
			$table->string('details_ar');
			$table->string('details_en');
			$table->float('lat');
			$table->float('lng');
			$table->tinyInteger('is_approved')->default('0');
			$table->integer('user_id');
			$table->integer('city_id');
		});
	}

	public function down()
	{
		Schema::drop('ads');
	}
}