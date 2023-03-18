<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\PaseListaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', function(Request $request){
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user = Auth::user();
        $arr = array('acceso' => "Ok", 'error' => "");

        return json_encode($arr);
    } else {
        $arr = array('acceso' => "", 'error' => "no existe el usuario o password" ,$request->email,"-",$request->password);
        return json_encode($arr);
    }
});

// Alumnos
Route::get('alumno/',[AlumnoController::class,'lista']);
Route::get('alumno/mostrar/{id}',[AlumnoController::class,'alumno']);
Route::post('alumno/guardar',[AlumnoController::class,'guardar']);
Route::post('alumno/eliminar/{id}',[AlumnoController::class,'eliminar']);

// Materias
Route::get('materia/',[MateriaController::class,'lista']);
Route::get('materia/mostrar/{id}',[MateriaController::class,'materia']);
Route::post('materia/guardar',[MateriaController::class,'guardar']);
Route::post('materia/eliminar/{id}',[MateriaController::class,'eliminar']);


// Pase de lista
// Route::get('pase/',[PaseListaController::class,'lista']);
// Route::get('pase/mostrar/{id}',[PaseListaController::class,'pase']);
// Route::post('pase/guardar',[PaseListaController::class,'guardar']);
// Route::post('pase/eliminar/{id}',[PaseListaController::class,'eliminar']);

//Profesor
Route::get('profesor/',[ProfesorController::class,'lista']);
Route::get('profesor/mostrar/{id}',[ProfesorController::class,'profesor']);
Route::post('profesor/guardar',[ProfesorController::class,'guardar']);
Route::post('profesor/eliminar/{id}',[ProfesorController::class,'eliminar']);