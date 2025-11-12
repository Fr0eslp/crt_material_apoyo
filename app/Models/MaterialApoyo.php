<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialApoyo extends Model 
{
    use HasFactory;

    protected $table = 'materialapoyo';

    public $timestamps = true;

    protected $fillable = [
        'no_unidad',
        'materia',
        'grupo',
        'periodo',
        'rfc',
        'id_material_apoyo',
        'materiales_apoyo',
        'materiales_apoyo1',
    ];

    // NOTA: Si 'periodo' es un string (Ej: '2024-1'), agregamos casts para evitar
    // que Eloquent intente convertirlo a Carbon (fecha).
    // Si tu columna 'periodo' en la DB sigue siendo DATE, DEBES ejecutar una migración 
    // para cambiarla a STRING o usar input type="date" en la vista.


}
