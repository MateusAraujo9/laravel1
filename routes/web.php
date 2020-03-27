<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/tarefas')->group(function(){
    Route::get('/', 'Tarefascontroller@index'); //Listar tarefas

    Route::get('add', 'TarefasController@add'); //tela de adicionar tarefa
    Route::post('add', 'TarefasController@addAction'); //Ação de adicionar tarefa

    Route::get('edit/{id}', 'TarefasController@edit'); //tela de edição de tarefa
    Route::post('edit/{id}', 'TarefasController@editAction'); //Ação de editar tarefa

    Route::get('delete/{id}', 'TarefasController@delete'); //ação de deletar tarefa

    Route::get('marcar/{id}', 'TarefasController@marcar'); //Ação de marcar como concluida ou não a tarefa
});
