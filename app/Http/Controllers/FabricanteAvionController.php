<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fabricante;
use App\Avion;
use Response;

class FabricanteAvionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($idFabricante) {
		//Mostramos todos los aviones de un fabricante
		//comprobamos si el fabricante existe

		$fabricante = Fabricante::find($idFabricante);

		if (!$fabricante) {
			//devolvemos codigo http404

			return response()->json([
						'errors' => Array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese codigo'
							])], 404);
		}//if


		return response()->json([
					'status' => 'ok', 'data' => $fabricante->aviones()->get()
						], 200);


		/* 		return response()->json([
		  'status' => 'ok', 'data' => $fabricante->aviones
		  ], 200); */
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($idFabricante, Request $request) {
		//Comprobamos que recibimos todos los datos de avion

		if (!$request->input('modelo') || !$request->input('modelo') || !$request->input('modelo') || !$request->input('modelo') || !$request->input('modelo')) {
			return response()->json([
						'errors' => Array(['code' => 422, 'message' => 'Faltan datos necesarios para el alta de avion'
							])], 422);
		}

		//Compruebo si existe el fabricante
		$fabricante = Fabricante::find($idFabricante);


		return response()->json([
					'errors' => Array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese codigo'
						])], 404);


		//damos de alta el avion de ese fabricante
		//devolvemos un json con los datos,codigo 201 y Location del nuevo recurso creado
		$nuevoAvion = $fabricante->aviones()->create($request->all());
		
		
			$respuesta = Response::make(json_encode(['data' => $nuevoAvion]), 201)->header('Location', 'http://www.dominio.local/aviones/' . $nuevoAvion->serie)->header('Content-Type', 'application/json');

		return $respuesta;
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
