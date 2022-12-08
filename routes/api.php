<?php

use App\Http\Controllers\Api\AdmisionDuracionController;
use App\Http\Controllers\Api\DepartamentoController;
use App\Http\Controllers\Api\DetalleExpedienteController;
use App\Http\Controllers\Api\DetallePagoController;
use App\Http\Controllers\Api\EnumeradoController;
use App\Http\Controllers\Api\EnumeradoDataController;
use App\Http\Controllers\Api\ExpedienteController;
use App\Http\Controllers\Api\FacultadController;
use App\Http\Controllers\Api\InscripcionController;
use App\Http\Controllers\Api\MencionController;
use App\Http\Controllers\Api\PagoController;
use App\Http\Controllers\Api\PersonaController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\ProgramaController;
use App\Http\Controllers\Api\ProvinciaController;
use App\Http\Controllers\Api\SedeController;
use App\Http\Controllers\Api\SubprogramaController;
use App\Http\Controllers\Api\UniversidadController;
use App\Http\Controllers\Api\UsuarioInscripcionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return response()->json(['message' => 'API REST - Posgrado', 'status' => 'Connected']);;
});

//Departamento
Route::get('/departamento', [DepartamentoController::class, 'index']);
Route::get('/departamento/{id}', [DepartamentoController::class, 'show']);

//Provincia
Route::get('/provincia', [ProvinciaController::class, 'index']);
Route::get('/provincia/{id}', [ProvinciaController::class, 'show']);
Route::get('/provincia/departamento/{id}', [ProvinciaController::class, 'showByDepartamento']);

//Distrito
Route::get('/distrito', [DistritoController::class, 'index']);
Route::get('/distrito/{id}', [DistritoController::class, 'show']);
Route::get('/distrito/provincia/{id}', [DistritoController::class, 'showByProvincia']);

//Universidad
Route::get('/universidad', [UniversidadController::class, 'index']);
Route::get('/universidad/{id}', [UniversidadController::class, 'show']);

//Enumerado
Route::get('/enumerado', [EnumeradoController::class, 'index']);
Route::get('/enumerado/{id}', [EnumeradoController::class, 'show']);
Route::get('/enumerado/data/{id}', [EnumeradoController::class, 'showData']);
Route::post('/enumerado', [EnumeradoController::class, 'store']);
Route::put('/enumerado/{id}', [EnumeradoController::class, 'update']);
Route::put('/enumerado/desactivate/{id}', [EnumeradoController::class, 'desactivate']);
Route::put('/enumerado/activate/{id}', [EnumeradoController::class, 'activate']);

//Enumerado Data
Route::get('/enumerado-data', [EnumeradoDataController::class, 'index']);
Route::get('/enumerado-data/{id}', [EnumeradoDataController::class, 'show']);
Route::get('/enumerado-data/enumerado/{id}', [EnumeradoDataController::class, 'showByEnumerado']);
Route::post('/enumerado-data', [EnumeradoDataController::class, 'store']);
Route::put('/enumerado-data/{id}', [EnumeradoDataController::class, 'update']);
Route::put('/enumerado-data/desactivate/{id}', [EnumeradoDataController::class, 'desactivate']);
Route::put('/enumerado-data/activate/{id}', [EnumeradoDataController::class, 'activate']);

//Plan
Route::get('/plan', [PlanController::class, 'index']);
Route::get('/plan/{id}', [PlanController::class, 'show']);
Route::post('/plan', [PlanController::class, 'store']);
Route::put('/plan/{id}', [PlanController::class, 'update']);
Route::put('/plan/desactivate/{id}', [PlanController::class, 'desactivate']);
Route::put('/plan/activate/{id}', [PlanController::class, 'activate']);

//Sede
Route::get('/sede', [SedeController::class, 'index']);
Route::get('/sede/{id}', [SedeController::class, 'show']);
Route::get('/sede/plan/{id}', [SedeController::class, 'showByPlan']);
Route::post('/sede', [SedeController::class, 'store']);
Route::put('/sede/{id}', [SedeController::class, 'update']);
Route::put('/sede/desactivate/{id}', [SedeController::class, 'desactivate']);
Route::put('/sede/activate/{id}', [SedeController::class, 'activate']);

//Programa
Route::get('/programa', [ProgramaController::class, 'index']);
Route::get('/programa/{id}', [ProgramaController::class, 'show']);
Route::get('/programa/sede/{id}', [ProgramaController::class, 'showBySede']);
Route::post('/programa', [ProgramaController::class, 'store']);
Route::put('/programa/{id}', [ProgramaController::class, 'update']);
Route::put('/programa/desactivate/{id}', [ProgramaController::class, 'desactivate']);
Route::put('/programa/activate/{id}', [ProgramaController::class, 'activate']);

//Facultad
Route::get('/facultad', [FacultadController::class, 'index']);
Route::get('/facultad/{id}', [FacultadController::class, 'show']);
Route::post('/facultad', [FacultadController::class, 'store']);
Route::put('/facultad/{id}', [FacultadController::class, 'update']);
Route::put('/facultad/desactivate/{id}', [FacultadController::class, 'desactivate']);
Route::put('/facultad/activate/{id}', [FacultadController::class, 'activate']);

//Subprograma
Route::get('/subprograma', [SubprogramaController::class, 'index']);
Route::get('/subprograma/{id}', [SubprogramaController::class, 'show']);
Route::get('/subprograma/programa/{id}', [SubprogramaController::class, 'showByPrograma']);
Route::get('/subprograma/facultad/{id}', [SubprogramaController::class, 'showByFacultad']);
Route::post('/subprograma', [SubprogramaController::class, 'store']);
Route::put('/subprograma/{id}', [SubprogramaController::class, 'update']);
Route::put('/subprograma/desactivate/{id}', [SubprogramaController::class, 'desactivate']);
Route::put('/subprograma/activate/{id}', [SubprogramaController::class, 'activate']);

//Mencion
Route::get('/mencion', [MencionController::class, 'index']);
Route::get('/mencion/{id}', [MencionController::class, 'show']);
Route::get('/mencion/subprograma/{id}', [MencionController::class, 'showBySubprograma']);
Route::post('/mencion', [MencionController::class, 'store']);
Route::put('/mencion/{id}', [MencionController::class, 'update']);
Route::put('/mencion/desactivate/{id}', [MencionController::class, 'desactivate']);
Route::put('/mencion/activate/{id}', [MencionController::class, 'activate']);

//Admision Duracion
Route::get('/admision-duracion', [AdmisionDuracionController::class, 'index']);
Route::get('/admision-duracion/{id}', [AdmisionDuracionController::class, 'show']);
Route::get('/admision-duracion/admision/{id}', [AdmisionDuracionController::class, 'showByAdmision']);
Route::post('/admision-duracion', [AdmisionDuracionController::class, 'store']);
Route::put('/admision-duracion/{id}', [AdmisionDuracionController::class, 'update']);
Route::put('/admision-duracion/desactivate/{id}', [AdmisionDuracionController::class, 'desactivate']);
Route::put('/admision-duracion/activate/{id}', [AdmisionDuracionController::class, 'activate']);

//Usuario Inscripcion
Route::get('/usuario-inscripcion', [UsuarioInscripcionController::class, 'index']);
Route::get('/usuario-inscripcion/{id}', [UsuarioInscripcionController::class, 'show']);
Route::get('/usuario-inscripcion/inscripcion/{id}', [UsuarioInscripcionController::class, 'showByInscripcion']);
Route::post('/usuario-inscripcion', [UsuarioInscripcionController::class, 'store']);
Route::put('/usuario-inscripcion/{id}', [UsuarioInscripcionController::class, 'update']);
Route::put('/usuario-inscripcion/desactivate/{id}', [UsuarioInscripcionController::class, 'desactivate']);
Route::put('/usuario-inscripcion/activate/{id}', [UsuarioInscripcionController::class, 'activate']);

//Pago
Route::get('/pago', [PagoController::class, 'index']);
Route::get('/pago/{id}', [PagoController::class, 'show']);
Route::post('/pago', [PagoController::class, 'store']);
Route::put('/pago/{id}', [PagoController::class, 'update']);

//Detalle Pago
Route::get('/detalle-pago', [DetallePagoController::class, 'index']);
Route::get('/detalle-pago/{id}', [DetallePagoController::class, 'show']);
Route::get('/detalle-pago/pago/{id}', [DetallePagoController::class, 'showByPago']);
Route::post('/detalle-pago', [DetallePagoController::class, 'store']);
Route::put('/detalle-pago/{id}', [DetallePagoController::class, 'update']);
Route::put('/detalle-pago/desactivate/{id}', [DetallePagoController::class, 'desactivate']);
Route::put('/detalle-pago/activate/{id}', [DetallePagoController::class, 'activate']);
Route::put('/detalle-pago/pago/{id}', [DetallePagoController::class, 'updateByPago']);

//Expediente
Route::get('/expediente', [ExpedienteController::class, 'index']);
Route::get('/expediente/{id}', [ExpedienteController::class, 'show']);
Route::post('/expediente', [ExpedienteController::class, 'store']);
Route::put('/expediente/{id}', [ExpedienteController::class, 'update']);
Route::put('/expediente/desactivate/{id}', [ExpedienteController::class, 'desactivate']);
Route::put('/expediente/activate/{id}', [ExpedienteController::class, 'activate']);

//Detalle Expediente
Route::get('/detalle-expediente', [DetalleExpedienteController::class, 'index']);
Route::get('/detalle-expediente/{id}', [DetalleExpedienteController::class, 'show']);
Route::get('/detalle-expediente/expediente/{id}', [DetalleExpedienteController::class, 'showByExpediente']);
Route::post('/detalle-expediente', [DetalleExpedienteController::class, 'store']);
Route::put('/detalle-expediente/{id}', [DetalleExpedienteController::class, 'update']);
Route::put('/detalle-expediente/desactivate/{id}', [DetalleExpedienteController::class, 'desactivate']);
Route::put('/detalle-expediente/activate/{id}', [DetalleExpedienteController::class, 'activate']);
Route::put('/detalle-expediente/expediente/{id}', [DetalleExpedienteController::class, 'updateByExpediente']);

//Persona
Route::get('/persona', [PersonaController::class, 'index']);
Route::get('/persona/{id}', [PersonaController::class, 'show']);
Route::get('/persona/documento/{id}', [PersonaController::class, 'showByDocumento']);
Route::post('/persona', [PersonaController::class, 'store']);
Route::put('/persona/{id}', [PersonaController::class, 'update']);

//Inscripcion
Route::get('/inscripcion', [InscripcionController::class, 'index']);
Route::get('/inscripcion/{id}', [InscripcionController::class, 'show']);
// Route::get('/inscripcion/persona/{id}', [InscripcionController::class, 'showByPersona']);
Route::post('/inscripcion', [InscripcionController::class, 'store']);
// Route::put('/inscripcion/{id}', [InscripcionController::class, 'update']);
