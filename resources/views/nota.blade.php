@extends('plantilla')

@section('contenido')
<div class="row">
    <div class="col-3">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach                
            </div>
        @endif
        <div class="card border-primary">
            <form action="{{route('notas.crear')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">                        
                        <label for="nombre">Titulo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">        
                    </div>                
                    <div class="form-group">
                        <label for="descripcion">Detalle</label>
                        <textarea name="descripcion" id="descripcion" rows="5" class="form-control">{{old('descripcion')}}</textarea>                
                    </div>                    
                    <input type="submit" value="Guardar" class="btn-primary form-control">
                </div>
            </form>
        </div>
    </div>
    <div class="col-9">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
            
                @foreach ($notas as $item)                    
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>
                        <a href="{{route('notas.detalle', $item->id)}}">{{$item->nombre}}</a>
                        
                    </td>
                    <td>{{$item->descripcion}}</td>
                    <td>
                        <a href="{{route('notas.editar', $item->id)}}"class="btn btn-secondary btn-sm">Edit</a>
                        <form action="{{route('notas.eliminar', $item->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>                            
                        </form>
                    </td>
                </tr>
                @endforeach
            
            </tbody>
        </table>
    </div>
</div>
@endsection