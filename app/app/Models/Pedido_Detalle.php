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

    public function crear($producto,$pedido){
        $this->cantidad=1;
        $this->precio=$producto->precio;
        $this->pedido_id=$pedido->id;
        $this->producto_id=$producto->id;
        $this->comentarios="";
    }

     public function sumar(){
        $this->cantidad=$this->cantidad+1;
        $this->save();         
    }

     public function restar(){
        $this->cantidad=$this->cantidad-1;
        $this->save(); 
    }

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }



}
