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
                                        
    <a href="{{ url('departamento/' . $departamento->id) }}" class="hex-content">
        <span class="hex-content-inner">
            <span class="title">Volver</span>
        </span>
        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
    </a>    
</div>


</div>

<h1 style="margin-left:100px; margin-top:70px; margin-bottom:70px;">Editar {{ $departamento->nombre }}</h1>

@if(Session::has('message'))
    <div style="padding-top: 20px;" class="alert alert-{{ session()->get('type') }}" role="alert">
        {{ session()->get('message') }}
    </div>
@endif

<form style="padding-right:100px; padding-left:100px; padding-top:20px;" action="{{ url('departamento/' . $departamento->id) }}" method="post">
    @csrf
    @method('put')
    <input class="form-control" value="{{ $departamento->nombre }}" type="text" name="nombre" placeholder="{{ $departamento->nombre }}" minlength="5" maxlength="150" required />
    <br>
    @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <input class="form-control" value="{{ $departamento->localizacion }}" type="text" name="localizacion" placeholder="{{ $departamento->localizacion }}" min="0" step="0.01"/>
    <br>
    @error('localizacion')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    ID del empleado jefe: <select name="idempleadojefe">
         @foreach ($empleados as $empleado)
             @if($departamento->idempleadojefe == $empleado->id)
                <option selected disabled value="">{{ $empleado->nombre }}</option>
            @endif
         @endforeach
        
        @foreach ($empleados as $empleado)
            <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
        @endforeach
    </select>
    &nbsp; &nbsp; &nbsp; &nbsp;
    <input class="btn btn-primary" type="submit" value="Editar"/>
</form>
@endsection