<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToListingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('listings', function(Blueprint $table)
		{
			$table->foreign('driver_id', 'listings_ibfk_1')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('car_id', 'listings_ibfk_2')->references('car_id')->on('cars')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('listings', function(Blueprint $table)
		{
			$table->dropForeign('listings_ibfk_1');
			$table->dropForeign('listings_ibfk_2');
		});
	}

}
