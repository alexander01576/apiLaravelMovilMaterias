<?php

namespace App\Http\Controllers;

use App\Models\materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    //
    public function lista()
    {
        $materias = materia::all();
        return $materias;
    }

    public function materia($id)
    {
        $materia = Materia::find($id);
        return $materia;
    }

    public function guardar(Request $request)
    {
        if ($request->id == 0) {
            $materia = new materia();
        } else {
            $materia = materia::find($request->id);
        }

        $materia->nombre = $request->nombre;
        $materia->horasxsemana = $request->horasxsemana;
        $materia->save();
        return $materia;
    }

    public function eliminar($id)
    {
        $materia = materia::find($id);
        $materia->delete();
        return "Ok";
    }
}
