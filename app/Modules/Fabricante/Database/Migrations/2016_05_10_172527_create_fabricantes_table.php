<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricantesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fabricantes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('direccion');
			$table->integer('telefono');

			// Para que también cree automáticamente los campos timestamps (created_at, updated_at)
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
		Schema::dropIfExists('fabricantes');
	}
}




