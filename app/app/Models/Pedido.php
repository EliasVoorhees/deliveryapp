<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

      protected $fillable = [
        'nombre_cliente',
        'numero_contacto',
        'repatidor_id',
        'estado',
        'hora_entrega',
        'total_precio',
        'direccion',
        'numero_pedido',
    ];

     public function pedido_detalle(){
        return $this->hasMany(Pedido_Detalle::class);
    }

     public function repatidor(){
        return $this->belongsTo(User::class, 'repatidor_id');
    }


}
