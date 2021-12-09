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
                                        
        <a href="{{ url('puesto') }}" class="hex-content">
            <span class="hex-content-inner">
                <span class="title">Volver</span>
            </span>
            <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
        </a>    
    </div>

    
</div>

<h1 style="margin-left:100px; margin-top:70px; margin-bottom:70px;">Crear puestos</h1>
@if(Session::has('message'))
    <div class="alert alert-{{ session()->get('type') }}" role="alert">
        {{ session()->get('message') }}
    </div>
@endif

<form style="padding-right:100px; padding-left:100px;" action="{{ url('puesto') }}" method="post">
    @csrf
    <input class="form-control" value="{{ old('nombre') }}" type="text" name="nombre" placeholder="Nombre del puesto" minlength="5" maxlength="150" required />
    <br>
    <input class="form-control" value="{{ old('minimo') }}" type="number" name="minimo" placeholder="Salario mínimo" min="0" step="0.01"/>
    <br>
    <input class="form-control" value="{{ old('maximo') }}" type="number" name="maximo" placeholder="Salario máximo" min="" max="9999999.99" step="0.01"/>
    <br>
    <input class="btn btn-primary" type="submit" value="Crear"/>
</form>

@endsection