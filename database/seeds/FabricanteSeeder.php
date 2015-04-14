<?php

use Illuminate\Database\Seeder;
use App\Fabricante;

//usamos el faker
use Faker\Factory as Faker;

class FabricanteSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//cremaos una instancia de faker
		$faker=Faker::create();
		
		//vamos a cubrir 5 fabricantes
		//cuando llamamamos al metoedo create del metodo fabricanbte
		//se esta creando una nueva fila del fabricante
		
		for($i =0; $i<5; $i++){
			Fabricante::create(
					[
						'nombre'=>$faker->word(),
						'direccion'=>$faker->word(),
						'telefono'=>$faker->randomNumber()
					]
					);
			
		}
	}

}
