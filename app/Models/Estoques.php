<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoques extends Model
{
    protected $table = 'estoques';
    protected $fillable = array('idEst', 'idProd', 'qtdEst');
    public $timestamps = false;
    public static function allProducts()
    {
        return static::all();
    }
}