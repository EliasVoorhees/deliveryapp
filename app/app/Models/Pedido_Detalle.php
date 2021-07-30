<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_Detalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'cantidad',
        'comentarios',
        'pedido_id',
        'precio',
    ];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }



}
