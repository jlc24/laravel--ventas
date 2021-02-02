<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // protected $primarykey = "idped";

    public function cliente()
    {
        return $this->belongsTo("App\Models\Cliente");
    }

    public function productos()
    {
        return $this->belongsToMany("App\Models\Producto");
    }
}
