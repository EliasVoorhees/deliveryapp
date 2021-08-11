<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

     protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'disponible',
        'tipo',
        'image',
        'tamaño',
        'pizza_id',
        'orden',
    ];

    public function pedidos(){
        return $this->hasMany(Pedido_Detalle::class);
    }

    public function pizza(){
        return $this->belongsTo(Pizza::class);
    }


}
