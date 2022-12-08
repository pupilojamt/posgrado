<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();

        if($personas->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($personas as $key => $value) {
            $array[$key] = [
                'persona_documento' => $value->persona_documento,
                'persona_apellido_paterno' => $value->persona_apellido_paterno,
                'persona_apellido_materno' => $value->persona_apellido_materno,
                'persona_nombre' => $value->persona_nombre,
                'persona_nombre_completo' => $value->persona_nombre_completo,
                'persona_direccion' => $value->persona_direccion,
                'persona_sexo' => $value->persona_sexo,
                'persona_fecha_nacimiento' => $value->persona_fecha_nacimiento,
                'persona_correo_1' => $value->persona_correo_1,
                'persona_correo_2' => $value->persona_correo_2,
                'persona_celular_1' => $value->persona_celular_1,
                'persona_celular_2' => $value->persona_celular_2,
                'persona_año_egreso' => $value->persona_año_egreso,
                'persona_centro_trabajo' => $value->persona_centro_trabajo,
                'discapacidad_id' => $value->discapacidad_id,
                'estado_civil_id' => $value->estado_civil_id,
                'grado_academico_id' => $value->grado_academico_id,
                'persona_especialidad' => $value->persona_especialidad,
                'universidad_id' => $value->universidad_id,
                'persona_pais' => $value->persona_pais,
                'ubigeo_direccion' => $value->ubigeo_direccion,
                'ubigeo_nacimiento' => $value->ubigeo_nacimiento,
                'inscripcion' => $value->inscripcion,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $persona = Persona::find($id);

        if($persona == null){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [
            'persona_documento' => $persona->persona_documento,
            'persona_apellido_paterno' => $persona->persona_apellido_paterno,
            'persona_apellido_materno' => $persona->persona_apellido_materno,
            'persona_nombre' => $persona->persona_nombre,
            'persona_nombre_completo' => $persona->persona_nombre_completo,
            'persona_direccion' => $persona->persona_direccion,
            'persona_sexo' => $persona->persona_sexo,
            'persona_fecha_nacimiento' => $persona->persona_fecha_nacimiento,
            'persona_correo_1' => $persona->persona_correo_1,
            'persona_correo_2' => $persona->persona_correo_2,
            'persona_celular_1' => $persona->persona_celular_1,
            'persona_celular_2' => $persona->persona_celular_2,
            'persona_año_egreso' => $persona->persona_año_egreso,
            'persona_centro_trabajo' => $persona->persona_centro_trabajo,
            'discapacidad_id' => $persona->discapacidad_id,
            'estado_civil_id' => $persona->estado_civil_id,
            'grado_academico_id' => $persona->grado_academico_id,
            'persona_especialidad' => $persona->persona_especialidad,
            'universidad_id' => $persona->universidad_id,
            'persona_pais' => $persona->persona_pais,
            'ubigeo_direccion' => $persona->ubigeo_direccion,
            'ubigeo_nacimiento' => $persona->ubigeo_nacimiento,
            'inscripcion' => $persona->inscripcion,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function showByDocumento($documento)
    {
        $persona = Persona::where('persona_documento', $documento)->first();

        if($persona == null){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [
            'persona_documento' => $persona->persona_documento,
            'persona_apellido_paterno' => $persona->persona_apellido_paterno,
            'persona_apellido_materno' => $persona->persona_apellido_materno,
            'persona_nombre' => $persona->persona_nombre,
            'persona_nombre_completo' => $persona->persona_nombre_completo,
            'persona_direccion' => $persona->persona_direccion,
            'persona_sexo' => $persona->persona_sexo,
            'persona_fecha_nacimiento' => $persona->persona_fecha_nacimiento,
            'persona_correo_1' => $persona->persona_correo_1,
            'persona_correo_2' => $persona->persona_correo_2,
            'persona_celular_1' => $persona->persona_celular_1,
            'persona_celular_2' => $persona->persona_celular_2,
            'persona_año_egreso' => $persona->persona_año_egreso,
            'persona_centro_trabajo' => $persona->persona_centro_trabajo,
            'discapacidad_id' => $persona->discapacidad_id,
            'estado_civil_id' => $persona->estado_civil_id,
            'grado_academico_id' => $persona->grado_academico_id,
            'persona_especialidad' => $persona->persona_especialidad,
            'universidad_id' => $persona->universidad_id,
            'persona_pais' => $persona->persona_pais,
            'ubigeo_direccion' => $persona->ubigeo_direccion,
            'ubigeo_nacimiento' => $persona->ubigeo_nacimiento,
            'inscripcion' => $persona->inscripcion,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'persona_documento' => 'required|numeric',
            'persona_apellido_paterno' => 'required',
            'persona_apellido_materno' => 'required',
            'persona_nombre' => 'required',
            'persona_direccion' => 'required',
            'persona_sexo' => 'required|numeric',
            'persona_fecha_nacimiento' => 'required|date',
            'persona_correo_1' => 'required|email',
            'persona_correo_2' => 'nullable|email',
            'persona_celular_1' => 'required|numeric',
            'persona_celular_2' => 'nullable|numeric',
            'persona_año_egreso' => 'required|numeric',
            'persona_centro_trabajo' => 'required',
            'discapacidad_id' => 'required|numeric',
            'estado_civil_id' => 'required|numeric',
            'grado_academico_id' => 'required|numeric',
            'persona_especialidad' => 'required',
            'universidad_id' => 'required|numeric',
            'persona_pais' => 'nullable',
            'ubigeo_direccion' => 'required|numeric',
            'ubigeo_nacimiento' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $persona = new Persona();
        $persona->persona_documento = $request->persona_documento;
        $persona->persona_apellido_paterno = $request->persona_apellido_paterno;
        $persona->persona_apellido_materno = $request->persona_apellido_materno;
        $persona->persona_nombre = $request->persona_nombre;
        $persona->persona_nombre_completo = $request->persona_apellido_paterno . ' ' . $request->persona_apellido_materno . ' ' . $request->persona_nombre;
        $persona->persona_direccion = $request->persona_direccion;
        $persona->persona_sexo = $request->persona_sexo;
        $persona->persona_fecha_nacimiento = $request->persona_fecha_nacimiento;
        $persona->persona_correo_1 = $request->persona_correo_1;
        $persona->persona_correo_2 = $request->persona_correo_2;
        $persona->persona_celular_1 = $request->persona_celular_1;
        $persona->persona_celular_2 = $request->persona_celular_2;
        $persona->persona_año_egreso = $request->persona_año_egreso;
        $persona->persona_centro_trabajo = $request->persona_centro_trabajo;
        $persona->discapacidad_id = $request->discapacidad_id;
        $persona->estado_civil_id = $request->estado_civil_id;
        $persona->grado_academico_id = $request->grado_academico_id;
        $persona->persona_especialidad = $request->persona_especialidad;
        $persona->universidad_id = $request->universidad_id;
        if($persona->persona_pais == null){
            $persona->persona_pais = 'Perú';
        }else{
            $persona->persona_pais = $request->persona_pais;
        }
        $persona->ubigeo_direccion = $request->ubigeo_direccion;
        $persona->ubigeo_nacimiento = $request->ubigeo_nacimiento;
        $persona->inscripcion = $request->inscripcion;
        $persona->save();

        return response()->json(['message' => 'Persona creada', 'status' => 'OK'], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'persona_documento' => 'required|numeric',
            'persona_apellido_paterno' => 'required',
            'persona_apellido_materno' => 'required',
            'persona_nombre' => 'required',
            'persona_direccion' => 'required',
            'persona_sexo' => 'required|numeric',
            'persona_fecha_nacimiento' => 'required|date',
            'persona_correo_1' => 'required|email',
            'persona_correo_2' => 'nullable|email',
            'persona_celular_1' => 'required|numeric',
            'persona_celular_2' => 'nullable|numeric',
            'persona_año_egreso' => 'required|numeric',
            'persona_centro_trabajo' => 'required',
            'discapacidad_id' => 'required|numeric',
            'estado_civil_id' => 'required|numeric',
            'grado_academico_id' => 'required|numeric',
            'persona_especialidad' => 'required',
            'universidad_id' => 'required|numeric',
            'persona_pais' => 'nullable',
            'ubigeo_direccion' => 'required|numeric',
            'ubigeo_nacimiento' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json(['message' => 'Error en los datos', 'status' => 'Bad Request', 'errors' => $validator->errors()], 400);
        }

        $persona = Persona::find($id);

        if($persona == null){
            return response()->json(['message' => 'Persona no encontrada', 'status' => 'Not Found'], 404);
        }

        $persona->persona_documento = $request->persona_documento;
        $persona->persona_apellido_paterno = $request->persona_apellido_paterno;
        $persona->persona_apellido_materno = $request->persona_apellido_materno;
        $persona->persona_nombre = $request->persona_nombre;
        $persona->persona_nombre_completo = $request->persona_apellido_paterno . ' ' . $request->persona_apellido_materno . ' ' . $request->persona_nombre;
        $persona->persona_direccion = $request->persona_direccion;
        $persona->persona_sexo = $request->persona_sexo;
        $persona->persona_fecha_nacimiento = $request->persona_fecha_nacimiento;
        $persona->persona_correo_1 = $request->persona_correo_1;
        $persona->persona_correo_2 = $request->persona_correo_2;
        $persona->persona_celular_1 = $request->persona_celular_1;
        $persona->persona_celular_2 = $request->persona_celular_2;
        $persona->persona_año_egreso = $request->persona_año_egreso;
        $persona->persona_centro_trabajo = $request->persona_centro_trabajo;
        $persona->discapacidad_id = $request->discapacidad_id;
        $persona->estado_civil_id = $request->estado_civil_id;
        $persona->grado_academico_id = $request->grado_academico_id;
        $persona->persona_especialidad = $request->persona_especialidad;
        $persona->universidad_id = $request->universidad_id;
        if($request->persona_pais == null){
            $persona->persona_pais = 'Perú';
        }else{
            $persona->persona_pais = $request->persona_pais;
        }
        $persona->ubigeo_direccion = $request->ubigeo_direccion;
        $persona->ubigeo_nacimiento = $request->ubigeo_nacimiento;
        $persona->save();

        return response()->json(['message' => 'Persona actualizada', 'status' => 'OK'], 200);
    }
}
