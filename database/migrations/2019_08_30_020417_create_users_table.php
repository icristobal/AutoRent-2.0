<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('name', 150);
			$table->string('email', 150)->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password', 150);
			$table->string('address', 75);
			$table->string('contact_number', 20);
			$table->binary('display_image')->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->boolean('usertype')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
