<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdmisionDuracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdmisionDuracionController extends Controller
{
    public function index()
    {
        $duracion = AdmisionDuracion::all();

        if($duracion->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($duracion as $key => $value) {
            $array[$key] = [
                'duracion_id' => $value->duracion_id,
                'duracion_fecha' => $value->duracion_fecha,
                'duracion_estado' => $value->duracion_estado,
                'admision_id' => $value->admision_id,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $duracion = AdmisionDuracion::find($id);

        if($duracion == null){
            return response()->json(['message' => 'No se encontro la duracion', 'status' => 'Not Found'], 404);
        }

        $array = [
            'duracion_id' => $duracion->duracion_id,
            'duracion_fecha' => $duracion->duracion_fecha,
            'duracion_estado' => $duracion->duracion_estado,
            'admision_id' => $duracion->admision_id,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function showByAdmision($id)
    {
        $duracion = AdmisionDuracion::where('admision_id', $id)->first();

        if($duracion == null){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [
            'duracion_id' => $duracion->duracion_id,
            'duracion_fecha' => $duracion->duracion_fecha,
            'duracion_estado' => $duracion->duracion_estado,
            'admision_id' => $duracion->admision_id,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'duracion_fecha' => 'required|date',
            'duracion_estado' => 'required|numeric',
            'admision_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $duracion = new AdmisionDuracion();
        $duracion->duracion_fecha = $request->duracion_fecha;
        $duracion->duracion_estado = $request->duracion_estado;
        $duracion->admision_id = $request->admision_id;
        $duracion->save();

        return response()->json(['message' => 'Duracion creada', 'status' => 'OK'], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'duracion_fecha' => 'required|date',
            'duracion_estado' => 'required|numeric',
            'admision_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $duracion = AdmisionDuracion::find($id);

        if($duracion == null){
            return response()->json(['message' => 'No se encontro la duracion', 'status' => 'Not Found'], 404);
        }

        $duracion->duracion_fecha = $request->duracion_fecha;
        $duracion->duracion_estado = $request->duracion_estado;
        $duracion->admision_id = $request->admision_id;
        $duracion->save();

        return response()->json(['message' => 'Duracion actualizada', 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $duracion = AdmisionDuracion::find($id);

        if($duracion == null){
            return response()->json(['message' => 'No se encontro la duracion', 'status' => 'Not Found'], 404);
        }

        $duracion->duracion_estado = 0;
        $duracion->save();

        return response()->json(['message' => 'Duracion desactivada', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $duracion = AdmisionDuracion::find($id);

        if($duracion == null){
            return response()->json(['message' => 'No se encontro la duracion', 'status' => 'Not Found'], 404);
        }

        $duracion->duracion_estado = 1;
        $duracion->save();

        return response()->json(['message' => 'Duracion activada', 'status' => 'OK'], 200);
    }
}
