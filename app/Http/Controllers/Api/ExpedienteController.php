<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpedienteController extends Controller
{
    public function index()
    {
        $expediente = Expediente::all();

        if($expediente->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($expediente as $key => $value) {
            $array[$key] = [
                'expediente_id' => $value->expediente_id,
                'expediente' => $value->expediente,
                'expediente_complemento' => $value->expediente_complemento,
                'expediente_estado' => $value->expediente_estado,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $expediente = Expediente::find($id);

        if($expediente == null){
            return response()->json(['message' => 'No se encontro el expediente', 'status' => 'Not Found'], 404);
        }

        $array = [
            'expediente_id' => $expediente->expediente_id,
            'expediente' => $expediente->expediente,
            'expediente_complemento' => $expediente->expediente_complemento,
            'expediente_estado' => $expediente->expediente_estado,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'expediente' => 'required',
            'expediente_complemento' => 'nullable',
            'expediente_estado' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $expediente = new Expediente();
        $expediente->expediente = $request->expediente;
        $expediente->expediente_complemento = $request->expediente_complemento;
        $expediente->expediente_estado = $request->expediente_estado;
        $expediente->save();

        return response()->json(['message' => 'Expediente creado', 'status' => 'OK'], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'expediente' => 'required',
            'expediente_complemento' => 'nullable',
            'expediente_estado' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $expediente = Expediente::find($id);

        if($expediente == null){
            return response()->json(['message' => 'No se encontro el expediente', 'status' => 'Not Found'], 404);
        }

        $expediente->expediente = $request->expediente;
        $expediente->expediente_complemento = $request->expediente_complemento;
        $expediente->expediente_estado = $request->expediente_estado;
        $expediente->save();

        return response()->json(['message' => 'Expediente actualizado', 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $expediente = Expediente::find($id);

        if($expediente == null){
            return response()->json(['message' => 'No se encontro el expediente', 'status' => 'Not Found'], 404);
        }

        $expediente->expediente_estado = 0;
        $expediente->save();

        return response()->json(['message' => 'Expediente desactivado', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $expediente = Expediente::find($id);

        if($expediente == null){
            return response()->json(['message' => 'No se encontro el expediente', 'status' => 'Not Found'], 404);
        }

        $expediente->expediente_estado = 1;
        $expediente->save();

        return response()->json(['message' => 'Expediente activado', 'status' => 'OK'], 200);
    }
}
