<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    use HasFactory;
    protected $table="estado_civil"; //hacer referencia a la tabla
    protected $primaryKey="id_estado_civil";//hacer referencia  la id
    protected $fillable=['descripcion'];
}
