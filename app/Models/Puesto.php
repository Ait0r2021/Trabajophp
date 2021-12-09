<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'puestos';
    
    protected $fillable = ['id', 'nombre', 'minimo', 'maximo'];
    
    
    public function empleados() {
        return $this -> hasMany('App\Models\Empleado', "idpuesto");
    }
}
