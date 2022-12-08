<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagoController extends Controller
{
    public function index()
    {
        $pago = Pago::all();

        if($pago->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($pago as $key => $value) {
            $array[$key] = [
                'pago_id' => $value->pago_id,
                'pago_fecha' => $value->pago_fecha,
                'concepto_pago_id' => $value->concepto_pago_id,
                'detalle_pago' => $value->detalle_pago,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $pago = Pago::find($id);

        if($pago == null){
            return response()->json(['message' => 'No se encontro el pago', 'status' => 'Not Found'], 404);
        }

        $array = [
            'pago_id' => $pago->pago_id,
            'pago_fecha' => $pago->pago_fecha,
            'concepto_pago_id' => $pago->concepto_pago_id,
            'detalle_pago' => $pago->detalle_pago,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'concepto_pago_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $pago = new Pago();
        $pago->pago_fecha = now();
        $pago->concepto_pago_id = $request->concepto_pago_id;
        $pago->save();

        return response()->json(['message' => 'Pago creado', 'status' => 'OK'], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'concepto_pago_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $pago = Pago::find($id);

        if($pago == null){
            return response()->json(['message' => 'No se encontro el pago', 'status' => 'Not Found'], 404);
        }

        $pago->pago_fecha = now();
        $pago->concepto_pago_id = $request->concepto_pago_id;
        $pago->save();

        return response()->json(['message' => 'Pago actualizado', 'status' => 'OK'], 200);
    }
}
