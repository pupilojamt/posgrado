<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sede;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SedeController extends Controller
{
    public function index()
    {
        $sede = Sede::all();

        if($sede->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($sede as $key => $value) {
            $array[$key] = [
                'sede_id' => $value->sede_id,
                'sede' => $value->sede,
                'sede_estado' => $value->sede_estado,
                'plan' => $value->plan,
                'programa' => $value->programa,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $sede = Sede::find($id);

        if($sede == null){
            return response()->json(['message' => 'No se encontro la sede', 'status' => 'Not Found'], 404);
        }

        $array = [
            'sede_id' => $sede->sede_id,
            'sede' => $sede->sede,
            'sede_estado' => $sede->sede_estado,
            'plan' => $sede->plan,
            'programa' => $sede->programa,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function showByPlan($id)
    {
        $sede = Sede::where('plan_id', $id)->get();

        if($sede->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($sede as $key => $value) {
            $array[$key] = [
                'sede_id' => $value->sede_id,
                'sede' => $value->sede,
                'sede_estado' => $value->sede_estado,
                'plan' => $value->plan,
                'programa' => $value->programa,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sede' => 'required',
            'sede_estado' => 'required|numeric',
            'plan_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $sede = new Sede();
        $sede->sede = $request->sede;
        $sede->sede_estado = $request->sede_estado;
        $sede->plan_id = $request->plan_id;
        $sede->save();

        return response()->json(['message' => 'Sede creada', 'status' => 'Created'], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'sede' => 'required',
            'sede_estado' => 'required|numeric',
            'plan_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $sede = Sede::find($id);

        if($sede == null){
            return response()->json(['message' => 'No se encontro la sede', 'status' => 'Not Found'], 404);
        }

        $sede->sede = $request->sede;
        $sede->sede_estado = $request->sede_estado;
        $sede->plan_id = $request->plan_id;
        $sede->save();

        return response()->json(['message' => 'Sede actualizada', 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $sede = Sede::find($id);

        if($sede == null){
            return response()->json(['message' => 'No se encontro la sede', 'status' => 'Not Found'], 404);
        }

        $sede->sede_estado = 0;
        $sede->save();

        return response()->json(['message' => 'Sede desactivada', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $sede = Sede::find($id);

        if($sede == null){
            return response()->json(['message' => 'No se encontro la sede', 'status' => 'Not Found'], 404);
        }

        $sede->sede_estado = 1;
        $sede->save();

        return response()->json(['message' => 'Sede activada', 'status' => 'OK'], 200);
    }
}
