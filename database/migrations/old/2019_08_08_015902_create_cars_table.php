<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->bigInteger('car_id', true)->unsigned();
			$table->string('make', 25);
			$table->string('model', 30);
			$table->boolean('type');
			$table->integer('capacity');
			$table->binary('image', 65535)->nullable();
			$table->bigInteger('driver_id')->unsigned()->index('driver_id');
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
		Schema::drop('cars');
	}

}
