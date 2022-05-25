<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $table="carreras"; //hacer referencia a la tabla
    protected $primaryKey="id_carrera";//hacer referencia  la id
    protected $fillable=['descripcion_carrera'];
}
