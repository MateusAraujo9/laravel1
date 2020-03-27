<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function index()
    {
        return view('tarefas.index');
    }

    public function add()
    {
        return view('tarefas.add');
    }

    public function addAction()
    {
        # code...
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
