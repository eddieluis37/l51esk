<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTicketsTables extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Crea la tabla importances

		Schema::create('importances', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100)->unique();


		});

		// Crea la tabla types

		Schema::create('types', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100)->unique();


		});


		//Crea la tabla para almacenar tickets

		Schema::create('tickets', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100)->unique();
			$table->text('text')->nullable();
			$table->string('description')->nullable();
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')
				->onUpdate('cascade')->onDelete('cascade');

			$table->unsignedInteger('importance_id');
			$table->foreign('importance_id')->references('id')->on('importances')
				->onUpdate('cascade')->onDelete('cascade');


			$table->unsignedInteger('type_id');
			$table->foreign('type_id')->references('id')->on('types')
				->onUpdate('cascade')->onDelete('cascade');


			$table->timestamps();
			$table->softDeletes();


		});

		/**
		 *
		 * Crea la tabla para relacionar ticket con los usuarios
		 *
		 * Schema::create('ticket_user', function(Blueprint $table) {
		 *
		 * $table->unsignedInteger('user_id');
		 * $table->unsignedInteger('ticket_id');
		 *
		 * $table->foreign('user_id')->references('id')->on('users')
		 * ->onUpdate('cascade')->onDelete('cascade');
		 * $table->foreign('ticket_id')->references('id')->on('tickets')
		 * ->onUpdate('cascade')->onDelete('cascade');
		 *
		 * $table->primary(['user_id', 'ticket_id']);
		 *
		 * $table->timestamps();
		 *
		 * });
		 */

		//Crea la tabla para almacenar notas

		Schema::create('notes', function (Blueprint $table) {
			$table->increments('id');
			$table->text('text')->nullable();

			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')
				->onUpdate('cascade')->onDelete('cascade');


			$table->unsignedInteger('ticket_id');
			$table->foreign('ticket_id')->references('id')->on('tickets')
				->onUpdate('cascade')->onDelete('cascade');

			$table->timestamps();
			$table->softDeletes();


		});

		Schema::create('watchers', function (Blueprint $table) {
			$table->increments('id');

			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')
				->onUpdate('cascade')->onDelete('cascade');


			$table->unsignedInteger('ticket_id');
			$table->foreign('ticket_id')->references('id')->on('tickets')
				->onUpdate('cascade')->onDelete('cascade');

			$table->timestamps();
			$table->softDeletes();


		});


	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('tickets');
		Schema::dropIfExists('importances');
		Schema::dropIfExists('types');
		Schema::dropIfExists('notes');
		Schema::dropIfExists('watchers');
	}

}