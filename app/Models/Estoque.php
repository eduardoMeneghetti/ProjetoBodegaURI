<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'estoques';
    protected $primaryKey = 'idEst';
    protected $fillable = array('idEst', 'idProd', 'qtdEst');

    public $timestamps = false;

    public function produto() {
        return $this->belongsTo(Produto::class, 'idProd', 'idProd');
    }

}
