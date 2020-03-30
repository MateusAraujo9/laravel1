<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tarefa;

class TarefasController extends Controller
{
    public function index()
    {
        $list = Tarefa::all();

        $retorno = [
            'list' => $list
        ];

        return view('tarefas.index', $retorno);
    }

    public function add()
    {
        return view('tarefas.add');
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'string'],
            'responsavel' => ['required', 'string'],
            'cpf' => ['required', 'string', 'size:11'],
            'email' => ['required', 'e-mail']
        ]);

        $tarefa = new Tarefa;
        $tarefa->titulo = $$request->input('titulo');;
        $tarefa->responsavel = $$request->input('responsavel');
        $tarefa->cpf = $$request->input('cpf');
        $tarefa->email = $$request->input('email');
        $tarefa->save();

       

        //maneiras de fazer redirect
        //1
        return redirect()->route('tarefas.index');

        //2
        // $url = route('tarefas.index');
        // return redirect($url);
    }

    public function edit($id)
    {
        $data = Tarefa::find($id);

        if ($data) {
            return view('tarefas.edit', ['data' => $data]);    
        }else{
            return redirect()->route('tarefas.index');
        }
    }

    public function editAction(Request $request, $id)
    {
        $request->validate([
            'titulo' => ['required', 'string'],
            'responsavel' => ['required', 'string'],
            'cpf' => ['required', 'string', 'size:11'],
            'email' => ['required', 'e-mail']
        ]);

        $tarefa = Tarefa::find($id);        
        $tarefa->titulo = $request->input('titulo');
        $tarefa->responsavel = $request->input('responsavel');
        $tarefa->cpf = $request->input('cpf');
        $tarefa->email = $request->input('email');
        $tarefa->save();
        
        return redirect()->route('tarefas.index');
    }

    public function delete($id)
    {
        Tarefa::find($id)->delete();
        return redirect()->route('tarefas.index');
    }

    public function marcar($id)
    {
        $t = Tarefa::find($id);
        if($t){
            $t->resolvido = 1 - $t->resolvido;
            $t->save();
        }

        return redirect()->route('tarefas.index');
    }
}
