<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetalleExpediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DetalleExpedienteController extends Controller
{
    public function index()
    {
        $detalle_expediente = DetalleExpediente::all();

        if($detalle_expediente->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($detalle_expediente as $key => $value) {
            $array[$key] = [
                'detalle_expediente_id' => $value->detalle_expediente_id,
                'detalle_expediente_file' => $value->detalle_expediente_file,
                'detalle_expediente_fecha_creado' => $value->detalle_expediente_fecha_creado,
                'detalle_expediente_fecha_actualizado' => $value->detalle_expediente_fecha_actualizado,
                'detalle_expediente_estado' => $value->detalle_expediente_estado,
                'inscripcion' => $value->inscripcion,
                'expediente' => $value->expediente,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $detalle_expediente = DetalleExpediente::find($id);

        if($detalle_expediente == null){
            return response()->json(['message' => 'No se encontro el detalle del expediente', 'status' => 'Not Found'], 404);
        }

        $array = [
            'detalle_expediente_id' => $detalle_expediente->detalle_expediente_id,
            'detalle_expediente_file' => $detalle_expediente->detalle_expediente_file,
            'detalle_expediente_fecha_creado' => $detalle_expediente->detalle_expediente_fecha_creado,
            'detalle_expediente_fecha_actualizado' => $detalle_expediente->detalle_expediente_fecha_actualizado,
            'detalle_expediente_estado' => $detalle_expediente->detalle_expediente_estado,
            'inscripcion' => $detalle_expediente->inscripcion,
            'expediente' => $detalle_expediente->expediente,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function showByExpediente($id)
    {
        $detalle_expediente = DetalleExpediente::where('expediente_id', $id)->get();

        if($detalle_expediente->isEmpty()){
            return response()->json(['message' => 'No se encontro el detalle del expediente', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($detalle_expediente as $key => $value) {
            $array[$key] = [
                'detalle_expediente_id' => $value->detalle_expediente_id,
                'detalle_expediente_file' => $value->detalle_expediente_file,
                'detalle_expediente_fecha_creado' => $value->detalle_expediente_fecha_creado,
                'detalle_expediente_fecha_actualizado' => $value->detalle_expediente_fecha_actualizado,
                'detalle_expediente_estado' => $value->detalle_expediente_estado,
                'inscripcion' => $value->inscripcion,
                'expediente' => $value->expediente,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'detalle_expediente_file' => 'required|file|mimes:pdf|max:10240',
            'detalle_expediente_estado' => 'required|numeric',
            'inscripcion_id' => 'required|numeric',
            'expediente_id' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $detalle_expediente = new DetalleExpediente();

        if($request->hasFile('detalle_expediente_file')){
            $file = $request->file('detalle_expediente_file');
            $name = time().'.'.$file->getClientOriginalName();
            $name_path = '/files/inscripcion/detalle_expediente/'.$name;
            $file->move(public_path().'/files/inscripcion/detalle_expediente/', $name);
            $detalle_expediente->detalle_expediente_file = $name_path;
        }

        $detalle_expediente->detalle_expediente_fecha_creado = now();
        $detalle_expediente->detalle_expediente_fecha_actualizado = now();
        $detalle_expediente->detalle_expediente_estado = $request->detalle_expediente_estado;
        $detalle_expediente->inscripcion_id = $request->inscripcion_id;
        $detalle_expediente->expediente_id = $request->expediente_id;
        $detalle_expediente->save();

        return response()->json(['message' => 'Detalle del expediente creado', 'status' => 'OK'], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'detalle_expediente_file' => 'nullable|file|mimes:pdf|max:10240',
            'detalle_expediente_estado' => 'required|numeric',
            'inscripcion_id' => 'required|numeric',
            'expediente_id' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $detalle_expediente = DetalleExpediente::find($id);

        if($detalle_expediente == null){
            return response()->json(['message' => 'No se encontro el detalle del expediente', 'status' => 'Not Found'], 404);
        }

        if($request->hasFile('detalle_expediente_file')){
            $file = $request->file('detalle_expediente_file');
            $name = time().'.'.$file->getClientOriginalName();
            $name_path = '/files/inscripcion/detalle_expediente/'.$name;
            $file->move(public_path().'/files/inscripcion/detalle_expediente/', $name);
            $detalle_expediente->detalle_expediente_file = $name_path;
        }

        $detalle_expediente->detalle_expediente_fecha_actualizado = now();
        $detalle_expediente->detalle_expediente_estado = $request->detalle_expediente_estado;
        $detalle_expediente->inscripcion_id = $request->inscripcion_id;
        $detalle_expediente->expediente_id = $request->expediente_id;
        $detalle_expediente->save();

        return response()->json(['message' => 'Detalle del expediente actualizado', 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $detalle_expediente = DetalleExpediente::find($id);

        if($detalle_expediente == null){
            return response()->json(['message' => 'No se encontro el detalle del expediente', 'status' => 'Not Found'], 404);
        }

        $detalle_expediente->detalle_expediente_estado = 0;
        $detalle_expediente->save();

        return response()->json(['message' => 'Detalle del expediente desactivado', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $detalle_expediente = DetalleExpediente::find($id);

        if($detalle_expediente == null){
            return response()->json(['message' => 'No se encontro el detalle del expediente', 'status' => 'Not Found'], 404);
        }

        $detalle_expediente->detalle_expediente_estado = 1;
        $detalle_expediente->save();

        return response()->json(['message' => 'Detalle del expediente activado', 'status' => 'OK'], 200);
    }
}
