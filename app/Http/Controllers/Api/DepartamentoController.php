<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamento = Departamento::all();

        if($departamento->isEmpty()){
            return response()->json(['message' => 'No hay departamentos registrados', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $departamento, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $departamento = Departamento::find($id);

        if($departamento == null){
            return response()->json(['message' => 'No se encontró el departamento', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $departamento, 'status' => 'OK'], 200);
    }
}
