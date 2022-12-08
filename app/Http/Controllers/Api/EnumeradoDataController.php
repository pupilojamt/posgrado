<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EnumeradoData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnumeradoDataController extends Controller
{
    public function index()
    {
        $enumerado_data = EnumeradoData::all();

        if($enumerado_data->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($enumerado_data as $key => $value) {
            $array[$key] = [
                'enumerado_datos_id' => $value->enumerado_datos_id,
                'enumerado_datos' => $value->enumerado_datos,
                'enumerado_datos_estado' => $value->enumerado_datos_estado,
                'enumerado' => $value->enumerado,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $enumerado_data = EnumeradoData::find($id);

        if($enumerado_data == null){
            return response()->json(['message' => 'No se encontro el enumerado data', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $enumerado_data, 'status' => 'OK'], 200);
    }

    public function showByEnumerado($id)
    {
        $enumerado_data = EnumeradoData::where('enumerado_id', $id)->get();

        if($enumerado_data->isEmpty()){
            return response()->json(['message' => 'No se encontro el enumerado data', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($enumerado_data as $key => $value) {
            $array[$key] = [
                'id' => $value->enumerado_datos_id,
                'entidad' => $value->enumerado_datos,
                'estado' => $value->enumerado_datos_estado,
                'enumerado' => $value->enumerado,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'enumerado_datos' => 'required',
            'enumerado_datos_estado' => 'required|numeric',
            'enumerado_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $enumerado_data = new EnumeradoData();
        $enumerado_data->enumerado_datos = $request->enumerado_datos;
        $enumerado_data->enumerado_datos_estado = $request->enumerado_datos_estado;
        $enumerado_data->enumerado_id = $request->enumerado_id;
        $enumerado_data->save();

        return response()->json(['message' => 'Se creo el enumerado data', 'data' => $enumerado_data, 'status' => 'Created'], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'enumerado_datos' => 'required',
            'enumerado_datos_estado' => 'required|numeric',
            'enumerado_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $enumerado_data = EnumeradoData::find($id);

        if($enumerado_data == null){
            return response()->json(['message' => 'No se encontro el enumerado data', 'status' => 'Not Found'], 404);
        }

        $enumerado_data->enumerado_datos = $request->enumerado_datos;
        $enumerado_data->enumerado_datos_estado = $request->enumerado_datos_estado;
        $enumerado_data->enumerado_id = $request->enumerado_id;
        $enumerado_data->save();

        return response()->json(['message' => 'Se actualizo el enumerado data', 'data' => $enumerado_data, 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $enumerado_data = EnumeradoData::find($id);

        if($enumerado_data == null){
            return response()->json(['message' => 'No se encontro el enumerado data', 'status' => 'Not Found'], 404);
        }

        $enumerado_data->enumerado_datos_estado = 0;
        $enumerado_data->save();

        return response()->json(['message' => 'Se desactivo el enumerado data', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $enumerado_data = EnumeradoData::find($id);

        if($enumerado_data == null){
            return response()->json(['message' => 'No se encontro el enumerado data', 'status' => 'Not Found'], 404);
        }

        $enumerado_data->enumerado_datos_estado = 1;
        $enumerado_data->save();

        return response()->json(['message' => 'Se activo el enumerado data', 'status' => 'OK'], 200);
    }
}
