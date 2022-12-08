<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Distrito;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    public function index()
    {
        $distrito = Distrito::all();

        if($distrito->isEmpty()){
            return response()->json(['message' => 'No hay distritos registrados', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $distrito, 'status' => 'OK'], 200);
    }

    public function show($id)
    {
        $distrito = Distrito::find($id);

        if($distrito == null){
            return response()->json(['message' => 'No se encontró el distrito', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $distrito, 'status' => 'OK'], 200);
    }

    public function showByProvincia($id)
    {
        $distrito = Distrito::where('provincia_id', $id)->get();

        if($distrito->isEmpty()){
            return response()->json(['message' => 'No hay distritos registrados para la provincia', 'status' => 'Not Found'], 404);
        }

        return response()->json(['data' => $distrito, 'status' => 'OK'], 200);
    }
}
