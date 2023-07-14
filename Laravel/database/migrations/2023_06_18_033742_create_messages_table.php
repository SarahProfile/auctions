<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	public function up()
	{
		Schema::create('messages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id');
			$table->integer('receiver_id');
			$table->string('message');
			$table->string('attachment')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('messages');
	}
}