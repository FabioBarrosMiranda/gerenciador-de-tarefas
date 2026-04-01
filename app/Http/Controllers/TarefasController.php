<?php

namespace App\Http\Controllers;

use App\Models\Tarefas;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function index(Request $request)
    {
        $query = Tarefas::where('user_id', auth()->id());

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $tarefas = $query->get();
        return view("tarefas.index", compact("tarefas"));
    }

    public function create()
    {
        return view("tarefas.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'max:70'],
            'descricao' => ['nullable', 'string', 'max:200'],
            'status' => ['required','in:pendente,em_andamento,concluida'],
            'prioridade' => ['required','in:baixa,media,alta']
        ]);

        Terefas::create([
            'user_id'=> auth()->id(),
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'status' => $request->status,
            'prioridade' => $request->prioridade,
            'data_entrega' => $request->data_entrega,
        ]);

        return redirect()->route("tarefas.index")->with("success", "Tarefa adicionada com sucesso!");
    }

    public function edit(Tarefas $tarefa)
    {
        return view("tarefas.edit", compact("tarefa"));
    }

    public function update(Request $request, Tarefas $tarefa)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'max:70'],
            'descricao' => ['nullable', 'string', 'max:200'],
            'status' => ['required','in:pendente,em_andamento,concluida'],
            'prioridade' => ['required','in:baixa,media,alta']
        ]);

        $tarefa->update($request->all());
        return redirect()->route("tarefas.index")->with("success","Tarefa foi atualizada com sucesso!");
    }

    public function destroy(Tarefas $tarefa)
    {
        $tarefa->delete();
        return redirect()->route("tarefas.index")->with("success","Tarefas removida com sucesso!");
    }
}
