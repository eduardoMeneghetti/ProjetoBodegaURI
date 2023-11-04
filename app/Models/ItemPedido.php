<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = 'intempedidos';
    protected $fillable = array('idItemPed', 'idPed', 'idProd', 'qtdItemPed', 'valorUnItem', 'valorTotal', 'liberado');
    public $timestamps = false;

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'idPed', 'idPed');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'idProd');
    }
}
