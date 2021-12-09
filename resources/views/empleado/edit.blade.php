@extends('../base')
@section('content')
<style>

    .contenedor {
        width: 100%;
        height: 80%;
        display: flex;
        padding-right: 100px;
        padding-left:100px;
        padding-top:170px;
        align-items:flex-start;
        justify-content:center;
        font-size:2em; 
        font-family:'News Cycle'; 
        text-transform: uppercase;
    }
    
    .navegador {
        height:20%;
        width:100%;
        padding-top:130px;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    
    td {
        background-color:white;
        color:black;
    }
    
</style>

<div class="navegador">
<div class="hexagon-item">
    <div class="hex-item">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="hex-item">
        <div></div>
         <div></div>
        <div></div>
    </div>                                   
                                        
    <a href="{{ url('empleado/' . $empleado->id) }}" class="hex-content">
        <span class="hex-content-inner">
            <span class="title">Volver</span>
        </span>
        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
    </a>    
</div>
</div>

<h1 style="margin-left:100px; margin-top:70px; margin-bottom:70px;">Editar el empleado {{ $empleado->nombre }}</h1>

@if(Session::has('message'))
    <div class="alert alert-{{ session()->get('type') }}" role="alert">
        {{ session()->get('message') }}
    </div>
@endif

<form style="padding-right:100px; padding-left:100px;" action="{{ url('empleado/' . $empleado->id) }}" method="post">
    @csrf
    @method('put')
    <input class="form-control" value="{{ $empleado->nombre }}" type="text" name="nombre" placeholder="{{ $empleado->nombre }}" minlength="5" maxlength="150" required />
    <br>
    @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <input class="form-control" value="{{ $empleado->apellidos }}" type="text" name="apellidos" placeholder="{{ $empleado->apellidos }}" minlength="5" maxlength="150" required/>
    <br>
    @error('apellidos')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <input class="form-control" value="{{ $empleado->email }}" type="text" name="email" placeholder="{{ $empleado->email }}"/>
    <br>
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <input class="form-control" value="{{ $empleado->telefono }}" type="number" name="telefono" placeholder="{{ $empleado->telefono }}" min="111111111" max="999999999" step="1" required/>
    <br>
    @error('telefono')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <input class="form-control" value="{{ $empleado->fechacontrato }}" type="date" name="fechacontrato" required/>
    <br>
    
    <select  name="idpuesto" required>
        @foreach ($puestos as $puesto)
            @if($puesto->id == $empleado->idpuesto)
                <option selected  value="{{ $puesto->id }}">{{ $puesto->nombre}}</option>
            @endif
            
            @if($puesto->id != $empleado->idpuesto)
                <option value="{{ $puesto->id }}">{{ $puesto->nombre }}</option>
            @endif
        @endforeach
    </select>
    
    &nbsp; &nbsp; &nbsp;
    
    <select value="{{ old('iddepartamento') }}" name="iddepartamento" required>
        @foreach ($departamentos as $departamento)
            @if($departamento->id == $departamento->iddepartamento)
                <option selected value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
            @endif
            
            @if($departamento->id != $departamento->iddepartamento)
                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
            @endif
        @endforeach
        
    </select>
    
    <input class="btn btn-primary" type="submit" value="Editar"/>
</form>












@endsection