<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\DepartamentoCreateRequest;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Departamento $departamento)
    {
        return view('departamento.index', ['departamentos' => Departamento::all()], ['departamento' => $departamento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamento.create', ['empleados' => Empleado::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartamentoCreateRequest $request)
    {
        $data = [];
        $data['message'] = 'Se ha añadido un departamento correctamente';
        $data['type'] = 'success';
        $input = $request->validated();
        $departamentos = new Departamento($request->all());
        try {
            $result = $departamentos->save();
        } catch(\Exception $e) {
            $data['message'] = 'No se ha podido crear el nuevo departamento';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('departamento')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        $data = [];
        $data['departamento'] = $departamento;
        $data['empleados'] = Empleado::all();
        return view('departamento.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamento $departamento)
    {
        return view('departamento.edit', ['departamento' => $departamento], ['empleados' => Empleado::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(DepartamentoCreateRequest $request, Departamento $departamento)
    {
        $data = [];
        $data['message'] = 'Se ha editado el departamento correctamente';
        $data['type'] = 'success';
        $input = $request->validated();
        try {
            $result = $departamento->update($request->all());
        } catch(\Exception $e) {
            $data['message'] = 'No se ha podido editar el departamento';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('departamento')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $data = [];
        $data['message'] = 'El departamento ' . $departamento->nombre . ' ha sido eliminado.';
        $data['type'] = 'success';
        try {
            $departamento->delete();
        } catch(\Exception $e) {
            $data['message'] = 'El departamento ' . $departamento->nombre . ' no ha sido ha sido eliminado.';
            $data['type'] = 'danger';
        }
        return redirect('departamento')->with($data);
    }
}
