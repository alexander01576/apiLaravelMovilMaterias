<?php

namespace App\Http\Controllers;

use App\Models\paseLista;
use Illuminate\Http\Request;

class PaseListaController extends Controller
{
    //
    public function lista()
    {
        $paseListas = paseLista::all();
        return $paseListas;
    }

    public function pase($id)
    {
        $paseLista = paseLista::find($id);
        return $paseLista;
    }

    public function guardar(Request $request)
    {
        if ($request->id == 0) {
            $paseLista = new paseLista();
        } else {
            $paseLista = paseLista::find($request->id);
        }

        $paseLista->fecha = $request->fecha;
        $paseLista->id_alumno = $request->id_alumno;
        $paseLista->id_materia = $request->id_materia;
        $paseLista->asistencia = $request->asistencia;
        $paseLista->save();
        return $paseLista;

    }

    public function eliminar(Request $request)
    {
        $paseLista = paseLista::find($request->id);
        $paseLista->delete();
        return "Ok";
    }
}
