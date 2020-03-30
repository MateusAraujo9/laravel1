<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function index()
    {
        $list = DB::select("SELECT * FROM tarefas");

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

        $titulo = $request->input('titulo');
        $responsavel = $request->input('responsavel');
        $cpf = $request->input('cpf');
        $email = $request->input('email');

        DB::insert("insert into tarefas (titulo, responsavel, cpf, email) values (:titulo, :responsavel, :cpf, :email)", [
            'titulo' => $titulo,
            'responsavel' => $responsavel,
            'cpf' => $cpf,
            'email' => $email
            ]);

        $url = route('tarefas.index');

        //maneiras de fazer redirect
        // return redirect()->route('tarefas.index');
        return redirect($url);
    }

    public function edit($id)
    {
        $data = DB::select("SELECT * FROM tarefas WHERE id = :id", [
            'id' => $id
        ]);

        if (count($data) > 0) {
            return view('tarefas.edit', ['data' => $data[0]]);    
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

        $titulo = $request->input('titulo');
        $responsavel = $request->input('responsavel');
        $cpf = $request->input('cpf');
        $email = $request->input('email');

        DB::update("UPDATE tarefas SET 
                    titulo = :titulo,
                    responsavel = :responsavel,
                    cpf = :cpf,
                    email = :email
                    WHERE id = :id", [
            'titulo' => $titulo,
            'responsavel' => $responsavel,
            'cpf' => $cpf,
            'email' => $email,
            'id' => $id
        ]);
        
        return redirect()->route('tarefas.index');
    }

    public function delete($id)
    {
        DB::delete("DELETE FROM tarefas WHERE id = :id", ['id' => $id]);

        return redirect()->route('tarefas.index');
    }

    public function marcar($id)
    {
        DB::update("UPDATE tarefas SET resolvido = 1 - resolvido where id = :id", [
            'id' => $id
        ]);

        return redirect()->route('tarefas.index');
    }
}
