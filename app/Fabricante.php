<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model {

	//Defini la tabla myqsl que usara este modelo
	
	protected $table="fabricantes";
	
	//atributos del nombre de la tabla que se pueden rellenar de forma masiva
	
	protected $fillable= array('nombre','direccion','telefono');
	
	//ocultamos los campos de timesptam en las consuktas
	
	protected $hiden=['created_at','update_at'];
	
	
		//Relacion de fabricante con aviones:
	
	public function aviones() {
		
		//la relacion seria: 1 fabricante tiene muchos avioenes:
		
		return $this->hasMany('App\Avion');
		
	}

}
