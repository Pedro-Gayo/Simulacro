@extends('index')
@section('content')
<form action="{{route('add')}}" class="my-2 mx-2" method="post">
    @csrf
    @method("POST")
    <div class="mb-3">
        <label for="titulo" class="form-label">titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo">
    </div>
    <div class="mb-3">
        <label for="autor" class="form-label">autor</label>
        <input type="text" class="form-control" id="autor" name="autor">
    </div>
    <div class="mb-3 form-check">
        <label class="form-check-label" for="date">fecha</label>
        <input type="date" class="form-check-input" id="date" name="date">
    </div>
    <div class="mb-3 form-check">
        <select name="estado" id="estado">
            <option value="0">disponible</option>
            <option value="1">no disponible</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form><br><br>

<form action="{{route('filtrar')}}" class="my-2 mx-2" method="get">
    @csrf
    @method("get")
    <h1>Filtra la lista</h1>
    <div class="mb-3 form-check">
        <select name="estado" id="estado">
            <option value="0">disponible</option>
            <option value="1">no disponible</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form><br><br>


<ul>
    @foreach($misLibros as $libro)
    <li>
        <p>{{$libro->titulo}}</p>
        <p>{{$libro->autor}}</p>
        <p>{{$libro->fecha}}</p>
        <?php if (($libro->estado) == 0) { ?>
            <p>Disponible</p>
        <?php } ?>
        <?php if (($libro->estado) == 1) { ?>
            <p>No disponible</p>
        <?php } ?>
        <form action="{{route('modify',$libro->id)}}" class="my-2 mx-2" method="post">
            @csrf
            @method("post")
            <select name="estado" id="estado">
                <option value="0">disponible</option>
                <option value="1">no disponible</option>
            </select>
            <button type="submit" class="btn btn-primary">Modificar Estado</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection