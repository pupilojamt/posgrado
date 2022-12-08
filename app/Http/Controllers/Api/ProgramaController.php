<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramaController extends Controller
{
    public function index()
    {
        $programa = Programa::all();

        if($programa->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($programa as $key => $value) {
            $array[$key] = [
                'programa_id' => $value->programa_id,
                'programa' => $value->programa,
                'programa_estado' => $value->programa_estado,
                'sede' => $value->sede,
                'subprograma' => $value->subprograma,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $programa = Programa::find($id);

        if($programa == null){
            return response()->json(['message' => 'No se encontro el programa', 'status' => 'Not Found'], 404);
        }

        $array = [
            'programa_id' => $programa->programa_id,
            'programa' => $programa->programa,
            'programa_estado' => $programa->programa_estado,
            'sede' => $programa->sede,
            'subprograma' => $programa->subprograma,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function showBySede($id)
    {
        $programa = Programa::where('sede_id', $id)->get();

        if($programa->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($programa as $key => $value) {
            $array[$key] = [
                'programa_id' => $value->programa_id,
                'programa' => $value->programa,
                'programa_estado' => $value->programa_estado,
                'sede' => $value->sede,
                'subprograma' => $value->subprograma,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'programa' => 'required',
            'programa_estado' => 'required|numeric',
            'sede_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $programa = new Programa();
        $programa->programa = $request->programa;
        $programa->programa_estado = $request->programa_estado;
        $programa->sede_id = $request->sede_id;
        $programa->save();

        return response()->json(['message' => 'Programa creado', 'status' => 'Created'], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'programa' => 'required',
            'programa_estado' => 'required|numeric',
            'sede_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $programa = Programa::find($id);

        if($programa == null){
            return response()->json(['message' => 'No se encontro el programa', 'status' => 'Not Found'], 404);
        }

        $programa->programa = $request->programa;
        $programa->programa_estado = $request->programa_estado;
        $programa->sede_id = $request->sede_id;
        $programa->save();

        return response()->json(['message' => 'Programa actualizado', 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $programa = Programa::find($id);

        if($programa == null){
            return response()->json(['message' => 'No se encontro el programa', 'status' => 'Not Found'], 404);
        }

        $programa->programa_estado = 0;
        $programa->save();

        return response()->json(['message' => 'Programa desactivado', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $programa = Programa::find($id);

        if($programa == null){
            return response()->json(['message' => 'No se encontro el programa', 'status' => 'Not Found'], 404);
        }

        $programa->programa_estado = 1;
        $programa->save();

        return response()->json(['message' => 'Programa activado', 'status' => 'OK'], 200);
    }
}
