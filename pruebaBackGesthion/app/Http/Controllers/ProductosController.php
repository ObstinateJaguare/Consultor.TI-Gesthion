<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductosModel;
class ProductosController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request, ProductosModel $productosModel)
    {

        $request->validate([
            'nombre' => 'required',
            'cantida' => 'required',
            'estado' => 'required',
        ]);

        try {
            $productosModel->nombre = $request->nombre;
            $productosModel->cantida = $request->cantida;
            $productosModel->estado = $request->estado;

            if ($productosModel->save()) {
                return response()->json($productosModel, 200);
            } else {
                return response()->json("No se pudo registrar", 201);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function showAll(ProductosModel $productosModel)
    {
        try {
            $productosModel::where("estado", "1")->first();
            if ($productosModel) {
                return response()->json($productosModel, 200);
            } else {
                return response()->json("No Hay datos que mostrar", 201);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function show($id, ProductosModel $productosModel)
    {
        try {
            $productosModel::where("idProducto", $id)->where("estado", "1")->first();
            if ($productosModel) {
                return response()->json($productosModel, 200);
            } else {
                return response()->json("No Hay datos que mostrar", 201);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update(Request $request, ProductosModel $productosModel)
    {
        try {
            $productosModel::find('idProducto',$request->id);

            $productosModel->nombre = $request->nombre;
            $productosModel->cantida = $request->cantida;
            $productosModel->estado = $request->estado;

            if ($productosModel->refresh()) {
                return response()->json($productosModel, 200);
            } else {
                return response()->json("No se pudo actualizar", 201);
            }
        } catch (\Throwable $th) {
            return throw $th;
        }
    }
}
