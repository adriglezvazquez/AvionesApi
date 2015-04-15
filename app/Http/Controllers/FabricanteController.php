<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Response;

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
	public function store(Request $request) {
		//
		//metodo llamada al hacer un post
		//comprobamos que recibimos todos los campos

		if (!$request->input('nombre') || !$request->input('direccion') || !$request->input('telefono')) {
			return response()->json([
						'errors' => Array(['code' => 422, 'message' => 'Faltan datos necesarios para procesar el alta'
							])], 422);
		}

		//insertamos los datos recibidos en la tabla 
		//devolvemos el codigo 201 que significa que se han insertados los datos
		
		$nuevoFabricante = Fabricante::create($request->all());
		
		//devolvemos la respuesta Http 201 (created) + los datos del nuevo fabricante + una cabecera de Location
		
		$respuesta = Response::make(json_encode(['data'=>$nuevoFabricante]),201)->header('Location','http://www.dominio.local/fabricante/'.$nuevoFabricante->id)->header('Content-Type','application/json');
		
		return $respuesta;
		
		
	}

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
						'errors' => Array(['code' => 422, 'message' => 'No se encuentra un fabricante con ese codigo'
							])], 422);
		}

		return response()->json(['status' => 'ok', 'data' => $fabricante], 200);
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
