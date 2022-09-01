<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoModel extends Model
{
    use HasFactory;

    //traer los datos de las cuentas  asociadas al pedido
    public function relacion_cuenta(){
        return $this->hasMany(CuentaModel::class,'idCuenta','idCuenta');
    }
    //traer los datos del producto  asociadas al pedido
    public function relacion_producto(){
        return $this->hasMany(ProductosModel::class,'producto','idProducto');
    }
}
