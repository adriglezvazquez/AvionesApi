<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Avion extends Model {

	//nombre de la tabla mysql
	
	protected $table= 'aviones';
	
	//clave primaria
	protected $primaryKey= 'serie';
	
	
	//campos de la tabla que se pueden asignar masivamente
	protected $filliable = array('modelo','longitud','capacidad','velocidad','alcance');
	
	//campos que queremos que se devuelvan en las cosnultas
	protected $hide= ['created_at','updated_at'];
	
	//Relacion de avion con fabricantes:
	
	public function fabricante() {
		
		//Un avion pertenece a un fabricante
		
		return $this->belongsTo('App\Fabricante');
		
	}

}
