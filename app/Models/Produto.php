<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = array('idProd','nomeProd', 'precoProd', 'descricaoProd', 'ativo','tipo');
    public $timestamps = false;
    public function estoque() {
        return $this->hasOne(Estoque::class, 'idProd', 'idProd');
    }


}
