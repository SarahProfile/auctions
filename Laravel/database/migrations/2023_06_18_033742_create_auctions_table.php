<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAuctionsTable extends Migration {

	public function up()
	{
		Schema::create('auctions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('user_id');
			$table->datetimeTz('start_at');
			$table->datetimeTz('end_at');
			$table->float('price');
			$table->integer('category_id');
			$table->integer('city_id');
		});
	}

	public function down()
	{
		Schema::drop('auctions');
	}
}