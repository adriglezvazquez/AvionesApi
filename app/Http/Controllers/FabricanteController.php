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

		$respuesta = Response::make(json_encode(['data' => $nuevoFabricante]), 201)->header('Location', 'http://www.dominio.local/fabricante/' . $nuevoFabricante->id)->header('Content-Type', 'application/json');

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
	public function update($id, Request $request) {
		//vamos a actualizar un fabricante
		//comprobamos si el fabricante existe.  En otro caso devolvemos error


		$fabricante = Fabricante::find($id);

		//si no existe mostrar error
		if (!$fabricante) {
			return response()->json([
						'errors' => Array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese codigo'
							])], 404);
		}

		//almacenamos en variables para facilitar el uso, los campos recibidos

		$nombre = $request->input('nombre');
		$direccion = $request->input('direccion');
		$telefono = $request->input('telefono');


		if ($request->method() == 'PATCH') {
			//actualizacion parcial de datos

			$bandera = false;
			if ($nombre != null && $nombre != '') {
				$fabricante->nombre = $nombre;
				$bandera = true;
			}


			if ($direccion != null && $direccion != '') {
				$fabricante->direccion = $direccion;
				$bandera = true;
			}

			if ($telefono != null && $telefono != '') {
				$fabricante->$telefono = $telefono;
				$bandera = true;
			}

			if ($bandera) {
				//devolvemos un codigo 200

				return response()->json([
							'status' => 'ok', 'data' => $fabricante]
								, 200);
			} else {

				return response()->json([
							'errors' => Array(['code' => 304, 'message' => 'No se ha modificado ningun dato'
								])], 304);
			}//else
		}
		
		//metodo PUT actualizamos todos los campos
		//comprobamos que recibimos todos
		if (!$nombre || !$direccion || !$telefono) {
			//se devuelve codigo 422 unprocessable Entity

			return response()->json([
						'errors' => Array(['code' => 422, 'message' => 'Faltan valores para completar precesamiento'
							])], 422);
		}


		//Actualizamos los 3 campos
		$nombre = $request->input('nombre');
		$direccion = $request->input('direccion');
		$telefono = $request->input('telefono');

		return response()->json([
					'status' => 'ok', 'data' => $fabricante]
						, 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
		//borrado de fabricante
		// fabricante/89 por DELETE
		//comprobamos si el fabricante existe o no existe

		$fabricante = Fabricante::find($id);

		//chequeamos si existe

		if (!$fabricante) {
			//devolvemos codigo http404

			return response()->json([
						'errors' => Array(['code' => 404, 'message' => 'No se encuentra un fabricante con ese codigo'
							])], 404);
		}//if


		$fabricante->delete();

		return response()->json([
					'code' => '204', 'message' => 'Se ha eliminado correctamente el fabricante'
						], 204);

		//borramos el fabricante y devolvemos codigo 204 (no content) sin contenido
		//este codigo no muestra texto en el body
	}

}
