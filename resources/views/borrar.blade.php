@extends('index')
@section('content')
<form action="{{route('delete')}}" method="post">
    @method('post')
    @csrf
    <label for="id">Introduce el id:</label>
    <input type="text" name="id" id="id">
    <input type="submit" value="Borrar">
</form>
@endsection