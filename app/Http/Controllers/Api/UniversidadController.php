<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Universidad;
use Illuminate\Http\Request;

class UniversidadController extends Controller
{
    public function index()
    {
        $universidad = Universidad::all();

        if ($universidad->isEmpty()) {
            return response()->json(['message' => 'No se encontraron registros', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $universidad, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $universidad = Universidad::find($id);

        if (is_null($universidad)) {
            return response()->json(['message' => 'No se encontró el registro', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $universidad, 'status' => 'OK'], 200);
    }
}
