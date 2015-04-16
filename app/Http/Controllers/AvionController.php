<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Avion;

class AvionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//devuelve todos los aviones
		
		
		return response()->json([
					'status' => 'ok', 'data' => Avion::all()
						], 200);
	}

	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//corresponde con la ruta /avions/{fabbricante}
		$avion = Avion::find($id);

		if (!$avion) {
			//se devuelve un error con los errores detectados y codigo 404

			return response()->json([
						'errors' => Array(['code' => 422, 'message' => 'No se encuentra un avion con ese codigo'
							])], 422);
		}

		return response()->json(['status' => 'ok', 'data' => $avion], 200);
	}

	
}
