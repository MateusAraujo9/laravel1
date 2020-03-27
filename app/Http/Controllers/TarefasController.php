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
        if($request->filled('titulo')){
            $titulo = $request->input('titulo');

            DB::insert("insert into tarefas (titulo) values (:titulo)", ['titulo' => $titulo]);

            $url = route('tarefas.index');

            //maneiras de fazer redirect
            // return redirect()->route('tarefas.index');
            return redirect($url);
        }else{
            return redirect()->route('tarefas.add')->with('warning', 'Você não preencheu o titulo');
        }
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
        if($request->filled('titulo')){
            DB::update("UPDATE tarefas SET titulo = :titulo WHERE id = :id", [
                'titulo' => $request->input('titulo'),
                'id' => $id
            ]);
            
            return redirect()->route('tarefas.index');
        }else{
            return redirect()->route('tarefas.edit', ['id' => $id])->with('warning', 'Você não preencheu o titulo');
        }
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
