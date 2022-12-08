<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UsuarioInscripcion;
use Illuminate\Http\Request;

class UsuarioInscripcionController extends Controller
{
    public function index()
    {
        $inscripcion = UsuarioInscripcion::all();

        if($inscripcion->isEmpty()){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [];
        foreach ($inscripcion as $key => $value) {
            $array[$key] = [
                'usuario_inscripcion_id' => $value->usuario_inscripcion_id,
                'usuario_username' => $value->usuario_username,
                'usuario_password' => $value->usuario_password,
                'usuario_estado' => $value->usuario_estado,
                'inscripcion' => $value->inscripcion,
            ];
        }

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $inscripcion = UsuarioInscripcion::find($id);

        if($inscripcion == null){
            return response()->json(['message' => 'No se encontro la inscripcion', 'status' => 'Not Found'], 404);
        }

        $array = [
            'usuario_inscripcion_id' => $inscripcion->usuario_inscripcion_id,
            'usuario_username' => $inscripcion->usuario_username,
            'usuario_password' => $inscripcion->usuario_password,
            'usuario_estado' => $inscripcion->usuario_estado,
            'inscripcion' => $inscripcion->inscripcion,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function showByInscripcion($id)
    {
        $inscripcion = UsuarioInscripcion::where('inscripcion', $id)->first();

        if($inscripcion == null){
            return response()->json(['message' => 'No hay datos', 'status' => 'Not Found'], 404);
        }

        $array = [
            'usuario_inscripcion_id' => $inscripcion->usuario_inscripcion_id,
            'usuario_username' => $inscripcion->usuario_username,
            'usuario_password' => $inscripcion->usuario_password,
            'usuario_estado' => $inscripcion->usuario_estado,
            'inscripcion' => $inscripcion->inscripcion,
        ];

        return response()->json(['data' => $array, 'status' => 'OK'], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_username' => 'required',
            'usuario_password' => 'required',
            'usuario_estado' => 'required|numeric',
            'inscripcion_id' => 'required|numeric',
        ]);

        $inscripcion = new UsuarioInscripcion();
        $inscripcion->usuario_username = $request->usuario_username;
        $inscripcion->usuario_password = $request->usuario_password;
        $inscripcion->usuario_estado = $request->usuario_estado;
        $inscripcion->inscripcion = $request->inscripcion;
        $inscripcion->save();

        return response()->json(['message' => 'Inscripcion creada', 'status' => 'Created'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'usuario_username' => 'required',
            'usuario_password' => 'required',
            'usuario_estado' => 'required|numeric',
            'inscripcion_id' => 'required|numeric',
        ]);

        $inscripcion = UsuarioInscripcion::find($id);

        if($inscripcion == null){
            return response()->json(['message' => 'No se encontro la inscripcion', 'status' => 'Not Found'], 404);
        }

        $inscripcion->usuario_username = $request->usuario_username;
        $inscripcion->usuario_password = $request->usuario_password;
        $inscripcion->usuario_estado = $request->usuario_estado;
        $inscripcion->inscripcion = $request->inscripcion;
        $inscripcion->save();

        return response()->json(['message' => 'Inscripcion actualizada', 'status' => 'OK'], 200);
    }

    public function desactivate($id)
    {
        $inscripcion = UsuarioInscripcion::find($id);

        if($inscripcion == null){
            return response()->json(['message' => 'No se encontro la inscripcion', 'status' => 'Not Found'], 404);
        }

        $inscripcion->usuario_estado = 0;
        $inscripcion->save();

        return response()->json(['message' => 'Inscripcion desactivada', 'status' => 'OK'], 200);
    }

    public function activate($id)
    {
        $inscripcion = UsuarioInscripcion::find($id);

        if($inscripcion == null){
            return response()->json(['message' => 'No se encontro la inscripcion', 'status' => 'Not Found'], 404);
        }

        $inscripcion->usuario_estado = 1;
        $inscripcion->save();

        return response()->json(['message' => 'Inscripcion activada', 'status' => 'OK'], 200);
    }
}
