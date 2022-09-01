<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaModel;


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
    public function showAll(CuentaModel $cuentaModel)
    {
        try {
            $cuentaModel::where("estado", "1")->get();
            if ($cuentaModel) {
                return response()->json($cuentaModel, 200);
            } else {
                return response()->json("No Hay datos que mostrar", 201);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function show($id, CuentaModel $cuentaModel)
    {
        try {
            $cuentaModel::where("idCuenta", $id)->where("estado", "1")->first();
            if ($cuentaModel) {
                return response()->json($cuentaModel, 200);
            } else {
                return response()->json("No Hay datos que mostrar", 201);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update(Request $request, CuentaModel $cuentaModel)
    {
        try {
            $cuentaModel::find('idCuenta',$request->id);

            $cuentaModel->nombre = $request->nombre;
            $cuentaModel->correo = $request->correo;
            $cuentaModel->telefono = $request->telefono;

            if ($cuentaModel->refresh()) {
                return response()->json($cuentaModel, 200);
            } else {
                return response()->json("No se pudo actualizar", 201);
            }
        } catch (\Throwable $th) {
            return throw $th;
        }
    }
}
