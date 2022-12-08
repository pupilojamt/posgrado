<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subprograma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubprogramaController extends Controller
{
    public function index()
    {
        $subprograma = Subprograma::all();

        if($subprograma->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($subprograma as $key => $value) {
            $array[$key] = [
                'subprograma_id' => $value->subprograma_id,
                'subprograma_codigo' => $value->subprograma_codigo,
                'subprograma' => $value->subprograma,
                'subprograma_estado' => $value->subprograma_estado,
                'programa' => $value->programa,
                'facultad' => $value->facultad,
                'mencion' => $value->mencion,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $subprograma = Subprograma::find($id);

        if($subprograma == null){
            return response()->json(['message' => 'No se encontro el subprograma', 'status' => 'Not Found'], 404);
        }

        $array = [
            'subprograma_id' => $subprograma->subprograma_id,
            'subprograma_codigo' => $subprograma->subprograma_codigo,
            'subprograma' => $subprograma->subprograma,
            'subprograma_estado' => $subprograma->subprograma_estado,
            'programa' => $subprograma->programa,
            'facultad' => $subprograma->facultad,
            'mencion' => $subprograma->mencion,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function showByPrograma($id)
    {
        $subprograma = Subprograma::where('programa_id', $id)->get();

        if($subprograma->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($subprograma as $key => $value) {
            $array[$key] = [
                'subprograma_id' => $value->subprograma_id,
                'subprograma_codigo' => $value->subprograma_codigo,
                'subprograma' => $value->subprograma,
                'subprograma_estado' => $value->subprograma_estado,
                'programa' => $value->programa,
                'facultad' => $value->facultad,
                'mencion' => $value->mencion,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function showByFacultad($id)
    {
        $subprograma = Subprograma::where('facultad_id', $id)->get();

        if($subprograma->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($subprograma as $key => $value) {
            $array[$key] = [
                'subprograma_id' => $value->subprograma_id,
                'subprograma_codigo' => $value->subprograma_codigo,
                'subprograma' => $value->subprograma,
                'subprograma_estado' => $value->subprograma_estado,
                'programa' => $value->programa,
                'facultad' => $value->facultad,
                'mencion' => $value->mencion,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subprograma_codigo' => 'required',
            'subprograma' => 'required',
            'subprograma_estado' => 'required|numeric',
            'programa_id' => 'required|numeric',
            'facultad_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $subprograma = new Subprograma();
        $subprograma->subprograma_codigo = $request->subprograma_codigo;
        $subprograma->subprograma = $request->subprograma;
        $subprograma->subprograma_estado = $request->subprograma_estado;
        $subprograma->programa_id = $request->programa_id;
        $subprograma->facultad_id = $request->facultad_id;
        $subprograma->save();

        return response()->json(['message' => 'Subprograma creado', 'status' => 'Created'], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'subprograma_codigo' => 'required',
            'subprograma' => 'required',
            'subprograma_estado' => 'required|numeric',
            'programa_id' => 'required|numeric',
            'facultad_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $subprograma = Subprograma::find($id);

        if($subprograma == null){
            return response()->json(['message' => 'No se encontro el subprograma', 'status' => 'Not Found'], 404);
        }

        $subprograma->subprograma_codigo = $request->subprograma_codigo;
        $subprograma->subprograma = $request->subprograma;
        $subprograma->subprograma_estado = $request->subprograma_estado;
        $subprograma->programa_id = $request->programa_id;
        $subprograma->facultad_id = $request->facultad_id;
        $subprograma->save();

        return response()->json(['message' => 'Subprograma actualizado', 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $subprograma = Subprograma::find($id);

        if($subprograma == null){
            return response()->json(['message' => 'No se encontro el subprograma', 'status' => 'Not Found'], 404);
        }

        $subprograma->subprograma_estado = 0;
        $subprograma->save();

        return response()->json(['message' => 'Subprograma desactivado', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $subprograma = Subprograma::find($id);

        if($subprograma == null){
            return response()->json(['message' => 'No se encontro el subprograma', 'status' => 'Not Found'], 404);
        }

        $subprograma->subprograma_estado = 1;
        $subprograma->save();

        return response()->json(['message' => 'Subprograma activado', 'status' => 'OK'], 200);
    }
}
