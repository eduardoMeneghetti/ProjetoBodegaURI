<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $primaryKey = 'idFunc';
    protected $fillable = array( 'idFunc', 'nomeFunc', 'cpfFunc', 'funcaoSistema', 'senha') ;
    public $timestamps = false;

    public function itensDoPedido(){
        return $this->belongsTo(Pedido::class, 'idPed', 'idPed');
    }
}
