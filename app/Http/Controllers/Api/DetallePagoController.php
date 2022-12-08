<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetallePago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetallePagoController extends Controller
{
    public function index()
    {
        $detallePago = DetallePago::all();

        if($detallePago->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($detallePago as $key => $value) {
            $array[$key] = [
                'detalle_pago_id' => $value->detalle_pago_id,
                'detalle_pago_documento' => $value->detalle_pago_documento,
                'detalle_pago_numero_operacion' => $value->detalle_pago_numero_operacion,
                'detalle_pago_monto' => $value->detalle_pago_monto,
                'detalle_pago_fecha' => $value->detalle_pago_fecha,
                'detalle_pago_estado' => $value->detalle_pago_estado,
                'canal_pago_id' => $value->canal_pago_id,
                'pago' => $value->pago,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $detallePago = DetallePago::find($id);

        if($detallePago == null){
            return response()->json(['message' => 'No se encontro el detalle de pago', 'status' => 'Not Found'], 404);
        }

        $array = [
            'detalle_pago_id' => $detallePago->detalle_pago_id,
            'detalle_pago_documento' => $detallePago->detalle_pago_documento,
            'detalle_pago_numero_operacion' => $detallePago->detalle_pago_numero_operacion,
            'detalle_pago_monto' => $detallePago->detalle_pago_monto,
            'detalle_pago_fecha' => $detallePago->detalle_pago_fecha,
            'detalle_pago_estado' => $detallePago->detalle_pago_estado,
            'canal_pago_id' => $detallePago->canal_pago_id,
            'pago' => $detallePago->pago,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function showByPago($id)
    {
        $detallePago = DetallePago::where('pago_id', $id)->get();

        if($detallePago->isEmpty()){
            return response()->json(['message' => 'No se encontro el detalle de pago', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($detallePago as $key => $value) {
            $array[$key] = [
                'detalle_pago_id' => $value->detalle_pago_id,
                'detalle_pago_documento' => $value->detalle_pago_documento,
                'detalle_pago_numero_operacion' => $value->detalle_pago_numero_operacion,
                'detalle_pago_monto' => $value->detalle_pago_monto,
                'detalle_pago_fecha' => $value->detalle_pago_fecha,
                'detalle_pago_estado' => $value->detalle_pago_estado,
                'canal_pago_id' => $value->canal_pago_id,
                'pago' => $value->pago,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'detalle_pago_documento' => 'required|numeric',
            'detalle_pago_numero_operacion' => 'required|numeric',
            'detalle_pago_monto' => 'required|numeric',
            'detalle_pago_fecha' => 'required|date',
            'detalle_pago_estado' => 'required|numeric',
            'canal_pago_id' => 'required|numeric',
            'pago_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $detallePago = new DetallePago();
        $detallePago->detalle_pago_documento = $request->detalle_pago_documento;
        $detallePago->detalle_pago_numero_operacion = $request->detalle_pago_numero_operacion;
        $detallePago->detalle_pago_monto = $request->detalle_pago_monto;
        $detallePago->detalle_pago_fecha = $request->detalle_pago_fecha;
        $detallePago->detalle_pago_estado = $request->detalle_pago_estado;
        $detallePago->canal_pago_id = $request->canal_pago_id;
        $detallePago->pago_id = $request->pago_id;
        $detallePago->save();

        return response()->json(['message' => 'Detalle de pago creado', 'status' => 'Created'], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'detalle_pago_documento' => 'required|numeric',
            'detalle_pago_numero_operacion' => 'required|numeric',
            'detalle_pago_monto' => 'required|numeric',
            'detalle_pago_fecha' => 'required|date',
            'detalle_pago_estado' => 'required|numeric',
            'canal_pago_id' => 'required|numeric',
            'pago_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $detallePago = DetallePago::find($id);

        if($detallePago == null){
            return response()->json(['message' => 'No se encontro el detalle de pago', 'status' => 'Not Found'], 404);
        }

        $detallePago->detalle_pago_documento = $request->detalle_pago_documento;
        $detallePago->detalle_pago_numero_operacion = $request->detalle_pago_numero_operacion;
        $detallePago->detalle_pago_monto = $request->detalle_pago_monto;
        $detallePago->detalle_pago_fecha = $request->detalle_pago_fecha;
        $detallePago->detalle_pago_estado = $request->detalle_pago_estado;
        $detallePago->canal_pago_id = $request->canal_pago_id;
        $detallePago->pago_id = $request->pago_id;
        $detallePago->save();

        return response()->json(['message' => 'Detalle de pago actualizado', 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $detallePago = DetallePago::find($id);

        if($detallePago == null){
            return response()->json(['message' => 'No se encontro el detalle de pago', 'status' => 'Not Found'], 404);
        }

        $detallePago->detalle_pago_estado = 0;
        $detallePago->save();

        return response()->json(['message' => 'Detalle de pago desactivado', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $detallePago = DetallePago::find($id);

        if($detallePago == null){
            return response()->json(['message' => 'No se encontro el detalle de pago', 'status' => 'Not Found'], 404);
        }

        $detallePago->detalle_pago_estado = 1;
        $detallePago->save();

        return response()->json(['message' => 'Detalle de pago activado', 'status' => 'OK'], 200);
    }

    public function updateByPago(Request $request, $id)
    {
        $request->validate([
            'detalle_pago_documento' => 'required|numeric',
            'detalle_pago_numero_operacion' => 'required|numeric',
            'detalle_pago_monto' => 'required|numeric',
            'detalle_pago_fecha' => 'required|date',
            'detalle_pago_estado' => 'required|numeric',
            'canal_pago_id' => 'required|numeric',
        ]);

        $detallePago = DetallePago::find($id);

        if($detallePago == null){
            return response()->json(['message' => 'No se encontro el detalle de pago', 'status' => 'Not Found'], 404);
        }

        $detallePago->pago_id = $request->pago_id;
        $detallePago->save();

        return response()->json(['message' => 'Detalle de pago actualizado', 'status' => 'OK'], 200);
    }
}
