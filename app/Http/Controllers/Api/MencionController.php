<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mencion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MencionController extends Controller
{
    public function index()
    {
        $mencion = Mencion::all();

        if($mencion->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($mencion as $key => $value) {
            $array[$key] = [
                'mencion_id' => $value->mencion_id,
                'mencion_codigo' => $value->mencion_codigo,
                'mencion' => $value->mencion,
                'mencion_estado' => $value->mencion_estado,
                'subprograma' => $value->subprograma,
                'inscripcion' => $value->inscripcion,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $mencion = Mencion::find($id);

        if($mencion == null){
            return response()->json(['message' => 'No se encontro la mencion', 'status' => 'Not Found'], 404);
        }

        $array = [
            'mencion_id' => $mencion->mencion_id,
            'mencion_codigo' => $mencion->mencion_codigo,
            'mencion' => $mencion->mencion,
            'mencion_estado' => $mencion->mencion_estado,
            'subprograma' => $mencion->subprograma,
            'inscripcion' => $mencion->inscripcion,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function showBySubprograma($id)
    {
        $mencion = Mencion::where('subprograma_id', $id)->get();

        if($mencion->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($mencion as $key => $value) {
            $array[$key] = [
                'mencion_id' => $value->mencion_id,
                'mencion_codigo' => $value->mencion_codigo,
                'mencion' => $value->mencion,
                'mencion_estado' => $value->mencion_estado,
                'subprograma' => $value->subprograma,
                'inscripcion' => $value->inscripcion,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mencion_codigo' => 'required',
            'mencion' => 'required',
            'mencion_estado' => 'required|numeric',
            'subprograma_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $mencion = new Mencion();
        $mencion->mencion_codigo = $request->mencion_codigo;
        $mencion->mencion = $request->mencion;
        $mencion->mencion_estado = $request->mencion_estado;
        $mencion->subprograma_id = $request->subprograma_id;
        $mencion->save();

        return response()->json(['message' => 'Mencion creada', 'status' => 'Created'], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'mencion_codigo' => 'required',
            'mencion' => 'required',
            'mencion_estado' => 'required|numeric',
            'subprograma_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $mencion = Mencion::find($id);

        if($mencion == null){
            return response()->json(['message' => 'No se encontro la mencion', 'status' => 'Not Found'], 404);
        }

        $mencion->mencion_codigo = $request->mencion_codigo;
        $mencion->mencion = $request->mencion;
        $mencion->mencion_estado = $request->mencion_estado;
        $mencion->subprograma_id = $request->subprograma_id;
        $mencion->save();

        return response()->json(['message' => 'Mencion actualizada', 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $mencion = Mencion::find($id);

        if($mencion == null){
            return response()->json(['message' => 'No se encontro la mencion', 'status' => 'Not Found'], 404);
        }

        $mencion->mencion_estado = 0;
        $mencion->save();

        return response()->json(['message' => 'Mencion desactivada', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $mencion = Mencion::find($id);

        if($mencion == null){
            return response()->json(['message' => 'No se encontro la mencion', 'status' => 'Not Found'], 404);
        }

        $mencion->mencion_estado = 1;
        $mencion->save();

        return response()->json(['message' => 'Mencion activada', 'status' => 'OK'], 200);
    }
}
