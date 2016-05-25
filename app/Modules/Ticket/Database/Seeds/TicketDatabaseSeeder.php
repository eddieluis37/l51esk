<?php
namespace App\Modules\Ticket\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;



use Faker\Factory as Faker;


use App\Modules\Ticket\Models\Ticket;
use App\Modules\Ticket\Models\Importance;


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

			$importances_id = Importance::insertGetId(
				[
					'name'			=>$faker->word(),

				]
			);


			$types_id =  Type::createinsertGetId(
				[
					'name'			=>$faker->word(),

				]
			);



			Ticket::create(
				[

					'user_id'		=>$faker->randomNumber(2), // de 2 dígitos como máximo.
					'importance_id' =>$importances_id,
					'type_id'		=>$types_id,
					'name'			=>$faker->word(),
					'text'			=>$faker->text(),
					'description'	=>$faker->randomNumber(9)	// de 9 dígitos como máximo.
				]
			);
		}


	}

}
