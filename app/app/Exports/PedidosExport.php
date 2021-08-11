<?php

namespace App\Exports;

use App\Models\Pedido;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PedidosExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
     use Exportable;

    public function headings(): array
    {
        return [
            'Número de pedido',
            'Cliente',
            'Número de contacto',
            'Dirección',
            'Estado',
            'Repartidor',
            'Fecha de pedido',
            'Fecha de entrega',
            'Total Precio',
        ];
    }

     public function map($pedido): array
    {
    	if($pedido->repartidor)$repartidor=$pedido->repartidor->name;
    	else $repartidor='';
    	//if($pedido->hora_entrega)$hora=Date::dateTimeToExcel($pedido->hora_entrega);
    	//else $hora='';
        return [
            $pedido->numero_pedido,
            $pedido->nombre_cliente,
            $pedido->numero_contacto,
            $pedido->direccion,
            $pedido->estado,
            $repartidor,
            $pedido->created_at,
            $pedido->hora_entrega,
            $pedido->total_precio,
        ];
    }

    public function __construct($numero,$estado,$desde,$hasta,$repartidor)
    {
        $this->numero = $numero;
        $this->estado = $estado;
        $this->desde = $desde;
        $this->hasta = $hasta;
        $this->repartidor = $repartidor;
    }

    public function query()
    {

         $data= Pedido::query()->orderByDesc('created_at')->where('estado', '!=', '');
         $desde = Carbon::parse( $this->desde)->toDateString();
         $hasta = Carbon::parse($this->hasta)->toDateString();

         if( $this->numero)
             $data = $data->where('numero_pedido',  $this->numero);
  
         if($this->estado)
             $data = $data->where('estado', $this->estado);

         if(  $this->desde)
             $data = $data->whereDate('created_at', '>=', $desde);

          if($this->hasta)
             $data = $data->whereDate('created_at', '<=', $hasta);

         if(  $this->repartidor){
            $repartidor =  $this->repartidor;
               $data = $data->whereHas('repartidor', function($q)  use($repartidor) {
                $q->where('name', 'like', '%'.$repartidor.'%');
                 });
          }
           
        return $data;
    }

 }

