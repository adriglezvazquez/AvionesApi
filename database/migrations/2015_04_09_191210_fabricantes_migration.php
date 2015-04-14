<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FabricantesMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fabricantes', function(Blueprint $table)
		{//indicamos el nombre de los campos en mysql
			
			$table->increments('id');
			$table->string("nombre");
			$table->string("direccion");
			$table->string("telefono");
			//automaitcamente anhadira cteate_at y update_at al activar opcion timestamps
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
		Schema::drop('fabricantes');
	}

}
