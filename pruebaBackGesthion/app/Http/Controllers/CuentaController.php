<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaModel;
use PhpParser\Node\Stmt\TryCatch;

class CuentaController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request, CuentaModel $cuentaModel)
    {
        return "Hola mundo";
         $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
        ]);

        try {
            $cuentaModel->nombre = $request->nombre;
            $cuentaModel->correo = $request->correo;
            $cuentaModel->telefono = $request->telefono;

            if ($cuentaModel->save()) {
                return response()->json($cuentaModel, 200);
            } else {
                return response()->json("No se pudo registrar", 201);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
