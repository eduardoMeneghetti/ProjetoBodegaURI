<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimests extends Model
{
    protected $table = 'movimests';
    protected $fillable = array('idMovEst', 'idProd', 'qtdEst', 'operacao','dtMov');
    public $timestamps = false;
    public static function allProducts()
    {
        return static::all();
    }
}