<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function user()
    {
        //relacion para poder obtener al usuario 
        return $this->belongsTo(User::class);
    }
    public function productos(){
        //Relacion de muchos a  muchos            le pasamos la  tabla en la cual se tiene la relación 
        return $this->belongsToMany(Producto::class,'pedido_productos')->withPivot('cantidad');//Aqui solo estamos trayendo la relacion por cual no podiamos acceder al valor de cantidad
                                                    //Cuando se quiere obtener una columna de la tabla pivote como lo es cantidad debemos indicarlo en la relacion para tener acceso a ese valor 
    }
}
