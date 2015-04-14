<?php

use Illuminate\Database\Seeder;
use App\Avion;
//usamos el faker
use Faker\Factory as Faker;
use App\Fabricante;

class AvionSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//cremaos una instancia de faker
		$faker = Faker::create();

		//necesitamos saber cuantos fabricantes tenemos.
		$cuantos = Fabricante::all()->count(); //nos devuelve todos los fabricantes
		//creamos un bucle para cubrir veinte aviones

		for ($i = 0; $i < 19; $i++) {
			Avion::create(
					[
						'modelo' => $faker->word(),
						'longitud' => $faker->randomFloat(),
						'capacidad' => $faker->randomNumber(),
						'velocidad' => $faker->randomNumber(),
						'alcance' => $faker->randomNumber(),
						'fabricante_id' => $faker->numberBetween(1,$cuantos)
					]
			);
		}
	}

}
