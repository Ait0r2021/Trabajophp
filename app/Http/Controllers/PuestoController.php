<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;
use App\Http\Requests\PuestoCreateRequest;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Puesto $puesto)
    {
       return view('puesto.index', ['puestos' => Puesto::all()], ['puesto' => $puesto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puesto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $data['message'] = 'Se ha añadido un puesto nuevo correctamente';
        $data['type'] = 'success';
        // $puesto = new Puesto($request->all());
        $puesto = Puesto::create($request->all());
        try {
            $result = $puesto->save();
        } catch(\Exception $e) {
            $data['message'] = 'No se ha podido crear el puesto';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('puesto')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(Puesto $puesto)
    {
        return view('puesto.show', ['puesto' => $puesto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Puesto $puesto)
    {
        return view('puesto.edit', ['puesto' => $puesto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puesto $puesto)
    {
        // ->update($request->all())
        $data = [];
        $data['message'] = 'Se ha editado el puesto correctamente';
        $data['type'] = 'success';
        try {
            $result = $puesto->update($request->all());
        } catch(\Exception $e) {
            $data['message'] = 'No se ha podido editar el puesto';
            $data['type'] = 'danger';
            return back()->withInput()->with($data);
        }
        return redirect('puesto')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puesto $puesto)
    {
        $data = [];
        $data['message'] = 'El puesto ' . $puesto->nombre . ' ha sido eliminado.';
        $data['type'] = 'success';
        try {
            $puesto->delete();
        } catch(\Exception $e) {
            $data['message'] = 'El puesto ' . $puesto->nombre . ' no ha sido ha sido eliminado.';
            $data['type'] = 'danger';
        }
        return redirect('puesto')->with($data);
    }
}
