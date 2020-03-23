@extends('plantilla')

@section('contenido')
<div class="row">
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

    
    <div class="col-3 mx-auto">
        @if (session('mensaje'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{session('mensaje')}}
        </div>
        @endif
        <div class="card border-primary">
            <form action="{{route('notas.update', $nota->id)}}" method="POST">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="form-group">                        
                        <label for="nombre">Titulo</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$nota->nombre}}">
                    </div>
                    <div class="form-group">                                                            
                        <label for="descripcion">Detalle</label>
                    <textarea name="descripcion" id="descripcion" rows="5" class="form-control">{{$nota->descripcion}}</textarea>                
                    </div>
                    <input type="submit" value="Editar" class="btn-primary form-control">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection