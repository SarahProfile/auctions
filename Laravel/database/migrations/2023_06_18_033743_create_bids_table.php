<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBidsTable extends Migration {

	public function up()
	{
		Schema::create('bids', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('auction_id');
			$table->integer('user_id');
			$table->float('price');
		});
	}

	public function down()
	{
		Schema::drop('bids');
	}
}