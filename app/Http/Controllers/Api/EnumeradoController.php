<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enumerado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class EnumeradoController extends Controller
{
    public function index()
    {
        $enumerado = Enumerado::all();

        if($enumerado->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($enumerado as $key => $value) {
            $array[$key] = [
                'enumerado_id' => $value->enumerado_id,
                'enumerado_entidad' => $value->enumerado_entidad,
                'enumerado_estado' => $value->enumerado_estado,
                'enumerado_data' => $value->enumerado_data,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $enumerado = Enumerado::find($id);

        if($enumerado == null){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $enumerado, 'status' => 'OK'], 200);
    }

    public function showData($id)
    {
        $enumerado = Enumerado::find($id);

        if($enumerado == null){
            return response()->json(['message' => 'No se encontro el enumerado', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $enumerado->enumerado_data, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'enumerado_entidad' => 'required',
            'enumerado_estado' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $enumerado = new Enumerado();
        $enumerado->enumerado_entidad = $request->enumerado_entidad;
        $enumerado->enumerado_estado = $request->enumerado_estado;
        $enumerado->save();

        return response()->json(['message' => 'Registro creado', 'data' => $enumerado, 'status' => 'Created'], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'enumerado_entidad' => 'required',
            'enumerado_estado' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $enumerado = Enumerado::find($id);

        if($enumerado == null){
            return response()->json(['message' => 'No se encontro el enumerado', 'status' => 'Not Found'], 404);
        }

        $enumerado->enumerado_entidad = $request->enumerado_entidad;
        $enumerado->enumerado_estado = $request->enumerado_estado;
        $enumerado->save();

        return response()->json(['message' => 'Registro actualizado', 'data' => $enumerado, 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $enumerado = Enumerado::find($id);

        if($enumerado == null){
            return response()->json(['message' => 'No se encontro el enumerado', 'status' => 'Not Found'], 404);
        }

        $enumerado->enumerado_estado = 0;
        $enumerado->save();

        return response()->json(['message' => 'Registro desactivado', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $enumerado = Enumerado::find($id);

        if($enumerado == null){
            return response()->json(['message' => 'No se encontro el enumerado', 'status' => 'Not Found'], 404);
        }

        $enumerado->enumerado_estado = 1;
        $enumerado->save();

        return response()->json(['message' => 'Registro activado', 'status' => 'OK'], 200);
    }
}
