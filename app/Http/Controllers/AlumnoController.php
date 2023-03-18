<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    //
    public function lista()
    {
        $alumnos = alumno::all();
        return $alumnos;
    }

    public function alumno($id)
    {
        $alumno = alumno::find($id);
        return $alumno;
    }

    public function guardar(Request $request)
    {
        if ($request->id == 0) {
            $alumno = new alumno();
        } else {
            $alumno = alumno::find($request->id);
        }

        $alumno->nombre = $request->nombre;
        $alumno->matricula = $request->matricula;
        $alumno->edad = $request->edad;
        $alumno->id_materia = $request->id_materia;
        $alumno->save();

        return $alumno;
    }

    public function eliminar(Request $request)
    {
        $alumno = alumno::find($request->id);
        $alumno->delete();
        return "Ok";
    }
}
