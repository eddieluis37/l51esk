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
		//Crea la tabla para almacenar tickets

		Schema::create('tickets', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100)->unique();
			$table->text('text')->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();


        });

        //Crea la tabla para relacionar ticket con los usuarios

        Schema::create('ticket_user', function(Blueprint $table) {

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('ticket_id');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'ticket_id']);

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
		Schema::dropIfExists('tickets');
        Schema::dropIfExists('ticket_user');
	}
}
