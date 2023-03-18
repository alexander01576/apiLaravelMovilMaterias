<?php

namespace App\Http\Controllers;

use App\Models\profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    //
    public function lista()
    {
        $profesors = profesor::all();
        return $profesors;
    }

    public function profesor($id)
    {
        $profesor = profesor::find($id);
        return $profesor;
    }

    public function guardar(Request $request)
    {
        if ($request->id == 0) {
            $profesor = new profesor();
        } else {
            $profesor = profesor::find($request->id);
        }

        $profesor->nombre = $request->nombre;
        $profesor->gradoEstudios = $request->gradoEstudios;
        $profesor->id_materia = $request->id_materia;
        $profesor->save();
        return $profesor;

    }

    public function eliminar(Request $request)
    {
        $profesor = profesor::find($request->id);
        $profesor->delete();
        return "Ok";
    }
}
