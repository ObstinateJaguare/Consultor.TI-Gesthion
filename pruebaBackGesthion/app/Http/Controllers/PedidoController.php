<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoModel;
class PedidoController extends Controller
{
     /**
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request, PedidoModel $PedidoModel)
    {

        $request->validate([
            'idCuent' => 'required',
            'producto' => 'required',
            'cantida' => 'required',
            'valor' => 'required',
            'total' => 'required',
            
        ]);

        try {
            $PedidoModel->idCuent = $request->idCuent;
            $PedidoModel->producto = $request->producto;
            $PedidoModel->cantida = $request->cantida;
            $PedidoModel->valor = $request->valor;
            $PedidoModel->total = $request->total;
            
            if ($PedidoModel->save()) {
                return response()->json($PedidoModel, 200);
            } else {
                return response()->json("No se pudo registrar", 201);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function showAll(PedidoModel $PedidoModel)
    {
        try {
            $PedidoModel::with('relacion_cuenta','relacion_producto')->get();
            if ($PedidoModel) {
                return response()->json($PedidoModel, 200);
            } else {
                return response()->json("No Hay datos que mostrar", 201);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function show($id, PedidoModel $PedidoModel)
    {
        try {
            $PedidoModel::where("idPedido", $id)->where("estado", "1")->first();
            if ($PedidoModel) {
                return response()->json($PedidoModel, 200);
            } else {
                return response()->json("No Hay datos que mostrar", 201);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update(Request $request, PedidoModel $PedidoModel)
    {
        try {
            $PedidoModel::find('idPedido',$request->id);

            $PedidoModel->idCuent = $request->idCuent;
            $PedidoModel->producto = $request->producto;
            $PedidoModel->cantida = $request->cantida;
            $PedidoModel->valor = $request->valor;
            $PedidoModel->total = $request->total;

            if ($PedidoModel->refresh()) {
                return response()->json($PedidoModel, 200);
            } else {
                return response()->json("No se pudo actualizar", 201);
            }
        } catch (\Throwable $th) {
            return throw $th;
        }
    }
}
