<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Puesto;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoCreateRequest;
use App\Http\Requests\EmpleadoEditRequest;
use DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        return view('empleado.index', ['empleados' => Empleado::all()], ['empleado' => $empleado] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create', ['puestos' => Puesto::all()], ['departamentos' => Departamento::all()]);  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoCreateRequest $request)
    {
        $data = [];
        $data['message'] = 'Se ha añadido un empleado correctamente';
        $data['type'] = 'success';
        $empleado = new Empleado($request->all());
        try {
            $result = $empleado->save();
        } catch(\Exception $e) {
            $data['message'] = 'El empleado no se ha podido añadir';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('empleado')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        $data = [];
        $data['empleado'] = $empleado;
        $data['puestos'] = Puesto::all();
        $data['departamentos'] = Departamento::all();
        return view('empleado.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $data = [];
        $data['empleado'] = $empleado;
        $data['puestos'] = Puesto::all();
        $data['departamentos'] = Departamento::all();
        return view('empleado.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(EmpleadoEditRequest $request, Empleado $empleado)
    {
        $data = [];
        $data['message'] = 'Se ha editado el empleado correctamente';
        $data['type'] = 'success';
        try {
            $result = $empleado->update($request->all());
        } catch(\Exception $e) {
            $data['message'] = 'No se ha podido editar el empleado';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('empleado')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $data = [];
        $id = $empleado->id;
        $data['message'] = 'El empleado ' . $empleado->nombre . ' ha sido eliminado.';
        $data['type'] = 'success';
        $departamentos = Departamento::all();
        foreach($departamentos as $departamento) {
            if($departamento->idempleadojefe == $empleado->id) {
                DB::table('departamentos')->where('departamentos.idempleadojefe', '=', $id)->update(['departamentos.idempleadojefe' => null]);  
            }
        }
        
    
        try {
            $empleado->delete();
        } catch(\Exception $e) {
            $data['message'] = 'El empleado ' . $empleado->nombre . ' no ha sido ha sido eliminado.';
            $data['type'] = 'danger';
        }
        return redirect('empleado')->with($data);
    }
}
