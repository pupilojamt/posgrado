<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
    public function index()
    {
        $plan = Plan::all();

        if($plan->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($plan as $key => $value) {
            $array[$key] = [
                'plan_id' => $value->plan_id,
                'plan' => $value->plan,
                'plan_estado' => $value->plan_estado,
                'sede' => $value->sede,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $plan = Plan::find($id);

        if($plan == null){
            return response()->json(['message' => 'No se encontro el plan', 'status' => 'Not Found'], 404);
        }

        $array = [
            'plan_id' => $plan->plan_id,
            'plan' => $plan->plan,
            'plan_estado' => $plan->plan_estado,
            'sede' => $plan->sede,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'plan' => 'required',
            'plan_estado' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $plan = new Plan();
        $plan->plan = $request->plan;
        $plan->plan_estado = $request->plan_estado;
        $plan->save();

        return response()->json(['message' => 'Registro creado', 'data' => $plan, 'status' => 'Created'], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'plan' => 'required',
            'plan_estado' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $plan = Plan::find($id);

        if($plan == null){
            return response()->json(['message' => 'No se encontro el plan', 'status' => 'Not Found'], 404);
        }

        $plan->plan = $request->plan;
        $plan->plan_estado = $request->plan_estado;
        $plan->save();

        return response()->json(['message' => 'Registro actualizado', 'data' => $plan, 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $plan = Plan::find($id);

        if($plan == null){
            return response()->json(['message' => 'No se encontro el plan', 'status' => 'Not Found'], 404);
        }

        $plan->plan_estado = 0;
        $plan->save();

        return response()->json(['message' => 'Registro desactivado', 'data' => $plan, 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $plan = Plan::find($id);

        if($plan == null){
            return response()->json(['message' => 'No se encontro el plan', 'status' => 'Not Found'], 404);
        }

        $plan->plan_estado = 1;
        $plan->save();

        return response()->json(['message' => 'Registro activado', 'data' => $plan, 'status' => 'OK'], 200);
    }
}
