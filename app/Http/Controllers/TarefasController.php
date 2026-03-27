<?php

namespace App\Http\Controllers;

use App\Models\Tarefas;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function index()
    {
       $tarefas = Tarefas::all();
       return view("tarefas.index", compact("tarefas"));
    }

    public function create()
    {
        return view("tarefas.create");
    }

    public function store(Request $request)
    {
       $tarefas = Tarefas::create($request->all());
        return redirect()->route("tarefas.index")->with("success","Tarefa foi adicionada com sucesso!");
    }

    public function edit(Tarefas $tarefas)
    {
        return view("tarefas.edit", compact("tarefas"));
    }

    public function update(Request $request, Tarefas $tarefas)
    {
        $tarefas->update($request->all());
        return redirect()->route("tarefas.update")->with("success","Tarefa foi atualizada com sucesso!");
    }

    public function destroy(Tarefas $tarefas)
    {
        $tarefas->delete();
        return redirect()->route("tarefas.index")->with("success","Tarefas removida com sucesso!");
    }
}
