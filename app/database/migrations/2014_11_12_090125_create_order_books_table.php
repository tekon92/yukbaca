<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_books', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_id');
			$table->integer('book_id');
			$table->integer('amount');
			$table->decimal('price', 10, 2);
			$table->decimal('total', 10, 2);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_books');
	}

}
