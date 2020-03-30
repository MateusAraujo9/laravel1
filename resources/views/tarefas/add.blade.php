@extends('layouts.default')

@section('title', 'Lista de Tarefas')
    
@section('content')
    <h1>Adição</h1>

    <form method="POST">
        @csrf

        <label for="titulo">
            Titulo: <br/> 
            <input type="text" name="titulo" id="titulo">
        </label>
        @error('titulo')
            <x-alert>
                {{$message}}
            </x-alert>
        @enderror

        <br><br>
        <label for="responsavel">
            Responsável: <br/> 
            <input type="text" name="responsavel" id="responsavel">
        </label>
        @error('responsavel')
            <x-alert>
                {{$message}}
            </x-alert>
        @enderror

        <br><br>
        <label for="cpf">
            CPF: <br/> 
            <input type="text" name="cpf" id="cpf">
        </label>
        @error('cpf')
            <x-alert>
                {{$message}}
            </x-alert>
        @enderror

        <br><br>
        <label for="email">
            E-mail: <br/> 
            <input type="email" name="email" id="email" maxlength="150" size="50">
        </label>
        @error('email')
            <x-alert>
                {{$message}}
            </x-alert>
        @enderror
        
        <br><br>
        <input type="submit" value="Adicionar">

    </form>
@endsection