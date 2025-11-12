<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personal';

    protected $primaryKey = 'rfc';

    protected $keyType = 'string';

    protected $fillable = [
        'rfc',
        'curp_empleado',
        'no_tarjeta',
        'apellidos_empleado',
        'nombre_empleado',
        'domicilio_empleado',
        'telefono_empleado',
        'sexo_empleado',
        'estado_civil',
        'fecha_titulacion',
        'correo_electronico',
        'fecha_cedula',
    ];
    
}
