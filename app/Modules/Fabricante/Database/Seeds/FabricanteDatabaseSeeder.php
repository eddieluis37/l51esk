<?php
namespace App\Modules\Fabricante\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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


		$faker = Faker::create();
		for ($i=0; $i < 50; $i++) {
			\DB::table('fabricantes')->insert(array(
				'nombre' => $faker->firstNameFemale,
				'direccion' => $faker->randomElement(['Calle 45 # 54 -998','Calle 54 # 45 -87','Carrera 97 # 2 - 104']),
				'telefono' 	=> $faker->phoneNumber,
				'created_at' => date('Y-m-d H:m:s'),
				'updated_at' => date('Y-m-d H:m:s')
			));
		}



	}





}
