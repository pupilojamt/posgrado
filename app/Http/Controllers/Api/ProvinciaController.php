<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function index()
    {
        $provincia = Provincia::all();

        if($provincia->isEmpty()){
            return response()->json(['message' => 'No hay provincias registradas', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $provincia, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $provincia = Provincia::find($id);

        if($provincia == null){
            return response()->json(['message' => 'No se encontró la provincia', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $provincia, 'status' => 'OK'], 200);
    }

    public function showByDepartamento($id)
    {
        $provincia = Provincia::where('departamento_id', $id)->get();

        if($provincia->isEmpty()){
            return response()->json(['message' => 'No hay provincias registradas para el departamento', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $provincia, 'status' => 'OK'], 200);
    }
}
