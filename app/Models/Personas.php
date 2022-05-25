<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;
    protected $table="personas"; //hacer referencia a la tabla
    protected $primaryKey="id_personas";//hcer referencia  la id

    protected $fillable=['nombre','apellidos','id_estado_civil','id_carrera','contraseña','direccion','correo'];
}
