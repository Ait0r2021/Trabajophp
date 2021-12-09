<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    protected $table = 'departamentos';
    
    protected $fillable = ['id', 'nombre', 'localizacion', 'idempleadojefe'];
    
    protected $attributes = ['localizacion' => "Granada"];
    
    
    public function empleado() {
        return $this -> belongsTo('App\Models\Empleado', "idempleadojefe");
    }
}
