<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'empleados';
    
    protected $fillable = ['id', 'nombre', 'apellidos', 'email', 'telefono', 'fechacontrato', 'idpuesto', 'iddepartamento'];
    
    
    public function puesto() {
        return $this -> belongsTo('App\Models\Puesto', "idpuesto");
    }
    
    public function departamento() {
        return $this -> hasMany('App\Models\Departamento', "iddepartamento");
    }
}
