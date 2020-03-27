@extends('layouts.default')

@section('title', 'Lista de Tarefas')
    
@section('content')
    <h1>Adição</h1>

    @if (session('warning'))
        <x-alert>
            {{session('warning')}}
        </x-alert>
    @endif

    <form method="POST">
        @csrf

        <label for="titulo">
            Titulo: <br/> 
            <input type="text" name="titulo" id="titulo">
        </label>
        <br><br>
        <label for="responsavel">
            Responsável: <br/> 
            <input type="text" name="responsavel" id="responsavel">
        </label>
        <br><br>
        <label for="cpf">
            CPF: <br/> 
            <input type="text" name="cpf" id="cpf">
        </label>
        <br><br>
        <label for="email">
            E-mail: <br/> 
            <input type="email" name="email" id="email" maxlength="150" size="50">
        </label>
        <br><br>
        <input type="submit" value="Adicionar">
    </form>
@endsection