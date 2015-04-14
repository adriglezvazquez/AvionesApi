<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//cargamos fabricante porque lo usamos mas abajo
use App\Fabricante;

class FabricanteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		//return "en el index de fabricante
		//Devolvemos un JSON cno todos los fabricantes
		//return Fabricante::all();
		//para devolver un json con codigo de respuesta HTTP

		return response()->json([
					'status' => 'ok', 'data' => Fabricante::all()
						], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	//No se utiliza este metodo porque se utiliza porque se usuaaria para mostrar un formulario de creacion de fabricantes y una api rest no hace eso 
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	/* 	public function store() {
	  //
	  } */

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//corresponde con la ruta /fabricantes/{fabbricante}
		$frabricante = Fabricante::find($id);

		if (!$favrucabte) {
			//se devuelve un error con los errores detectados y codigo 404

			return response()->json([
						'errors' => Array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese codigo'
							])], 404);
		}
		
		return response()-> json(['status'=>'ok','data'=>$fabricante],200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
