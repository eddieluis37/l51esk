<?php
namespace App\Modules\Fabricante\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


// Hace uso del modelo de Fabricante.
use App\Fabricante;


use Faker\Factory as Faker;


class FabricanteDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */


	public function run()
	{
		// Model::unguard();

		// $this->call('App\Modules\Fabricante\Database\Seeds\FoobarTableSeeder');


		// Creamos una instancia de Faker

		$faker = Faker::create();
		// Creamos un bucle para cubrir 5 fabricantes:
		for ($i=0; $i<4; $i++)
		{
			// Cuando llamamos al método create del Modelo Fabricante
			// se está creando una nueva fila en la tabla.
			Fabricante::create(
				[
					'nombre'=>$faker->word(),
					'direccion'=>$faker->word(),
					'telefono'=>$faker->randomNumber(9)	// de 9 dígitos como máximo.
				]
			);
		}

	}

}
