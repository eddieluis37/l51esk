<?php
namespace App\Modules\Ticket\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;



use Faker\Factory as Faker;


use App\Modules\Ticket\Models\Ticket;

class TicketDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Model::unguard();

		// $this->call('App\Modules\Ticket\Database\Seeds\FoobarTableSeeder');


		// Creamos una instancia de Faker

		$faker = Faker::create();
		// Creamos un bucle para cubrir 5 fabricantes:
		for ($i=0; $i<4; $i++)
		{
			// Cuando llamamos al método create del Modelo Ticket
			// se está creando una nueva fila en la tabla.

			Ticket::create(
				[
					'name'			=>$faker->word(),
					'text'			=>$faker->text(),
					'description'	=>$faker->randomNumber(9)	// de 9 dígitos como máximo.
				]
			);
		}


	}

}
