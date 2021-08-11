<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido_Detalle;
use App\Models\Producto;


class Pedido extends Model
{
    use HasFactory;

      protected $fillable = [
        'nombre_cliente',
        'numero_contacto',
        'repartidor_id',
        'estado',
        'hora_entrega',
        'total_precio',
        'direccion',
        'numero_pedido',
    ];

     public function __construct(){
        $this->total_precio=0;
    }

     public function pedido_detalle(){
        return $this->hasMany(Pedido_Detalle::class);
    }

     public function repartidor(){
        return $this->belongsTo(User::class, 'repartidor_id');
    }

      public function add($item, $id){


  
       $sumar=0;

        foreach ($this->pedido_detalle as $detalle) {

           if($detalle->producto->id == $id){
            $detalle->sumar();
            $sumar++;
            }
       }
       if(!$sumar){
        $detalle = new Pedido_Detalle();
        $detalle->crear($item, $this);
        $detalle->save();
        $this->pedido_detalle()->save($detalle);

       }

       $this->refresh();

         $this->total_precio = $this->total();
       $this->save();
    }

    public function restar($item, $id){

        foreach ($this->pedido_detalle as $detalle) {

           if($detalle->producto->id == $id){
            $detalle->restar();
            if(!$detalle->cantidad) $detalle->delete();
            }
       }
        $this->refresh();

       $this->total_precio = $this->total();
       $this->save();
      
    }

      private function total(){
       $pedido_detalle = $this->pedido_detalle ;
        $total = 0;
       foreach ($pedido_detalle as $producto) {
           $total += $producto->producto->precio * $producto->cantidad;
           $producto->precio=$producto->producto->precio * $producto->cantidad;
           $producto->save();
       }

        return $total;
    }





}
