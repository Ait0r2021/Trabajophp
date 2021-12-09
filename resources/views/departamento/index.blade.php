@extends('../base')
@section('content')
<style>

    .contenedor {
        width: 100%;
        height: 80%;
        display: flex;
        padding-right: 100px;
        padding-left:100px;
        padding-top:130px;
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
        margin-bottom: 50px;
        display:flex;
        align-items:center;
        justify-content:space-evenly;
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
                                        
    <a href="{{ url('/') }}" class="hex-content">
        <span class="hex-content-inner">
            <span class="title">Volver</span>
        </span>
        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
    </a>    
</div>

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
                                        
    <a href="{{ url('departamento/create') }}" class="hex-content">
        <span class="hex-content-inner">
            <span class="title">Añadir departamento</span>
        </span>
        <svg viewbox="0 0 173.20508075688772 200" height="200" width="174" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M86.60254037844386 0L173.20508075688772 50L173.20508075688772 150L86.60254037844386 200L0 150L0 50Z" fill="#1e2530"></path></svg>
    </a>    
</div>

</div>

<div class="modal" id="modalDelete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar?</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <p>Desea eliminar el departamento <span id="eliminarDepartamento"></span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form id="modalDeleteResourceForm" action="{{ url('departamento/' . $departamento->id) }}" method="post">
            @method('delete')
            @csrf
            <input type="submit" class="btn btn-primary" value="Eliminar departamento"/>
        </form>
      </div>
    </div>
  </div>
</div>

@if(Session::has('message'))
    <div style="padding-right: 100px; padding-left: 100px; margin-top: 150px;" class="alert alert-{{ session()->get('type') }}" role="alert">
        {{ session()->get('message') }}
    </div>
@endif

<div class="contenedor">

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col" colspan="3">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departamentos as $departamento)
            <tr>
                <td>
                    {{ $departamento->id }}
                </td>
                <td>
                    {{ $departamento->nombre }}
                </td>
                <td>
                    <a href="{{ url('departamento/' . $departamento->id) }}">Mostrar</a>
                </td>
                <td>
                    <a href="{{ url('departamento/' . $departamento->id . '/edit') }}">Editar</a>
                </td>
                <td>
                    <a href="javascript: void(0);" data-name="{{ $departamento->nombre }}" data-url="{{ url('departamento/' . $departamento->id) }}" data-toggle="modal" data-target="#modalDelete">eliminar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ url('assets/js/deleteDepartamento.js') }}"></script>
@endsection