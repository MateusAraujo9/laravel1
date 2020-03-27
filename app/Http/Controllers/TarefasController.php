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

    public function edit()
    {
        return view('tarefas.edit');
    }

    public function editAction()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }

    public function marcar()
    {
        # code...
    }
}
