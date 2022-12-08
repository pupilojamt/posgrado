<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripcion = Inscripcion::all();

        if($inscripcion->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($inscripcion as $key => $value) {
            $array[$key] = [
                'inscripcion_id' => $value->inscripcion_id,
                'inscripcion_codigo' => $value->inscripcion_codigo,
                'inscripcion_estado' => $value->inscripcion_estado,
                'inscripcion_fecha' => $value->inscripcion_fecha,
                'inscripcion_file' => $value->inscripcion_file,
                'persona' => $value->persona,
                'admision_id' => $value->admision_id,
                'mencion' => $value->mencion,
                'pago' => $value->pago,
                'usuario' => $value->usuario_inscripcion,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $inscripcion = Inscripcion::find($id);

        if($inscripcion == null){
            return response()->json(['message' => 'No se encontro la inscripcion', 'status' => 'Not Found'], 404);
        }

        $array = [
            'inscripcion_id' => $inscripcion->inscripcion_id,
            'inscripcion_codigo' => $inscripcion->inscripcion_codigo,
            'inscripcion_estado' => $inscripcion->inscripcion_estado,
            'inscripcion_fecha' => $inscripcion->inscripcion_fecha,
            'inscripcion_file' => $inscripcion->inscripcion_file,
            'persona' => $inscripcion->persona,
            'admision_id' => $inscripcion->admision_id,
            'mencion' => $inscripcion->mencion,
            'pago' => $inscripcion->pago,
            'usuario' => $inscripcion->usuario_inscripcion,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'persona_id' => 'required|numeric',
            'admision_id' => 'required|numeric',
            'mencion_id' => 'required|numeric',
            'pago_id' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        //obtener el ultimo codigo de inscripcion
        $ultimo_codigo_inscripcion = Inscripcion::orderBy('inscripcion_codigo','DESC')->first()->inscripcion_codigo;
        if($ultimo_codigo_inscripcion == null){
            //obetener el año actual
            $anio_actual = date('Y');
            $ultimo_codigo_inscripcion = 'INS'.$anio_actual.'0001';
        }else{
            $ultimo_codifo_inscripcion = substr($ultimo_codigo_inscripcion, 7, 10);
            $ultimo_codifo_inscripcion = intval($ultimo_codifo_inscripcion) + 1;
            if($ultimo_codifo_inscripcion < 10){
                $ultimo_codifo_inscripcion = '000'.$ultimo_codifo_inscripcion;
            }else if($ultimo_codifo_inscripcion < 100){
                $ultimo_codifo_inscripcion = '00'.$ultimo_codifo_inscripcion;
            }else if($ultimo_codifo_inscripcion < 1000){
                $ultimo_codifo_inscripcion = '0'.$ultimo_codifo_inscripcion;
            }else if($ultimo_codifo_inscripcion < 10000){
                $ultimo_codifo_inscripcion = $ultimo_codifo_inscripcion;
            }
            //obetener el año actual
            $anio_actual = date('Y');
            $ultimo_codifo_inscripcion = 'INS'.$anio_actual.$ultimo_codifo_inscripcion;
        }

        $inscripcion = new Inscripcion();
        $inscripcion->inscripcion_codigo = $ultimo_codifo_inscripcion;
        $inscripcion->inscripcion_estado = 1;
        $inscripcion->inscripcion_fecha = now();

        $inscripcion->inscripcion_file = null; //no se ha subido el archivo (ver despues)

        $inscripcion->persona_id = $request->persona_id;
        $inscripcion->admision_id = $request->admision_id;
        $inscripcion->mencion_id = $request->mencion_id;
        $inscripcion->pago_id = $request->pago_id;
        $inscripcion->save();

        return response()->json(['message' => 'Inscripcion creada', 'status' => 'OK'], 200);
    }

}
