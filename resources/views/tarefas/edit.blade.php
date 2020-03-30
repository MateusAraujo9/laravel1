@extends('layouts.default')

@section('title', 'Edição de Tarefas')
    
@section('content')
    <h1>Edição</h1>

    @if (session('warning'))
        <x-alert>
            {{session('warning')}}
        </x-alert>
    @endif

    <form method="POST">
        @csrf

        <label for="titulo">
            Titulo: <br/> 
        <input type="text" name="titulo" id="titulo" value="{{ $data->titulo }}">
        </label>

        @error('titulo')
            <x-alert>
                {{$message}}
            </x-alert>
        @enderror

        <br><br>
        <label for="responsavel">
            Responsável: <br/> 
            <input type="text" name="responsavel" id="responsavel" value="{{ $data->responsavel }}">
        </label>
        @error('responsavel')
            <x-alert>
                {{$message}}
            </x-alert>
        @enderror

        <br><br>
        <label for="cpf">
            CPF: <br/> 
            <input type="text" name="cpf" id="cpf" value="{{ $data->cpf }}">
        </label>
        @error('cpf')
            <x-alert>
                {{$message}}
            </x-alert>
        @enderror

        <br><br>
        <label for="email">
            E-mail: <br/> 
            <input type="email" name="email" id="email" maxlength="150" size="50" value="{{ $data->email }}">
        </label>
        @error('email')
            <x-alert>
                {{$message}}
            </x-alert>
        @enderror
        
        <br><br>

        <input type="submit" value="Salvar">
    </form>
@endsection