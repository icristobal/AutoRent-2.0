<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->bigInteger('txn_id')->unsigned()->primary();
			$table->bigInteger('listing_id')->unsigned()->index('listing_id');
			$table->bigInteger('passenger_id')->unsigned()->index('passenger_id');
			$table->string('rent_start', 50);
			$table->string('rent_end', 50);
			$table->string('destionation', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}

}
