@extends('layouts.default')

@section('title', 'Edição de Tarefas')
    
@section('content')
    <form method="POST">
        @csrf

        <label for="titulo">
            Titulo: <br/> 
            <input type="text" name="titulo" id="titulo">
        </label>

        <input type="submit" value="Editar">
    </form>
@endsection