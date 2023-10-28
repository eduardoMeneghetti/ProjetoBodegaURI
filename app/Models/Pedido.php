<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'idPed';
    protected $fillable = array('idPed', 'dtPed', 'totalPedido', 'mesa', 'obsPed', 'idFunc', 'liberado') ;
    public $timestamps = false;


    public function itensDoPedido(){
        return $this->belongsTo(Pedido::class, 'idPed', 'idPed');
    }
}
