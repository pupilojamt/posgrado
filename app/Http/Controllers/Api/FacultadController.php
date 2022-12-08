<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Facultad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacultadController extends Controller
{
    public function index()
    {
        $facultad = Facultad::all();

        if($facultad->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($facultad as $key => $value) {
            $array[$key] = [
                'facultad_id' => $value->facultad_id,
                'facultad_codigo' => $value->facultad_codigo,
                'facultad' => $value->facultad,
                'facultad_estado' => $value->facultad_estado,
                'subprograma' => $value->subprograma,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $facultad = Facultad::find($id);

        if($facultad == null){
            return response()->json(['message' => 'No se encontro la facultad', 'status' => 'Not Found'], 404);
        }

        $array = [
            'facultad_id' => $facultad->facultad_id,
            'facultad_codigo' => $facultad->facultad_codigo,
            'facultad' => $facultad->facultad,
            'facultad_estado' => $facultad->facultad_estado,
            'subprograma' => $facultad->subprograma,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'facultad_codigo' => 'required',
            'facultad' => 'required',
            'facultad_estado' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $facultad = new Facultad();
        $facultad->facultad_codigo = $request->facultad_codigo;
        $facultad->facultad = $request->facultad;
        $facultad->facultad_estado = $request->facultad_estado;
        $facultad->save();

        return response()->json(['message' => 'Facultad creada', 'status' => 'OK'], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'facultad_codigo' => 'required',
            'facultad' => 'required',
            'facultad_estado' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $facultad = Facultad::find($id);

        if($facultad == null){
            return response()->json(['message' => 'No se encontro la facultad', 'status' => 'Not Found'], 404);
        }

        $facultad->facultad_codigo = $request->facultad_codigo;
        $facultad->facultad = $request->facultad;
        $facultad->facultad_estado = $request->facultad_estado;
        $facultad->save();

        return response()->json(['message' => 'Facultad actualizada', 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $facultad = Facultad::find($id);

        if($facultad == null){
            return response()->json(['message' => 'No se encontro la facultad', 'status' => 'Not Found'], 404);
        }

        $facultad->facultad_estado = 0;
        $facultad->save();

        return response()->json(['message' => 'Facultad desactivada', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $facultad = Facultad::find($id);

        if($facultad == null){
            return response()->json(['message' => 'No se encontro la facultad', 'status' => 'Not Found'], 404);
        }

        $facultad->facultad_estado = 1;
        $facultad->save();

        return response()->json(['message' => 'Facultad activada', 'status' => 'OK'], 200);
    }
}
