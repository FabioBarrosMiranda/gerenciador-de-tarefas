@extends('layouts.app')

@section('content')

<h2>Nova Tarefa</h2>

<form action="{{ route('tarefas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control">
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pendente">Pendente</option>
            <option value="em_andamento">Em andamento</option>
            <option value="concluida">Concluída</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Prioridade</label>
        <select name="prioridade" class="form-control">
            <option value="baixa">Baixa</option>
            <option value="media">Média</option>
            <option value="alta">Alta</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Data de Entrega</label>
        <input type="date" name="data_entrega" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Cancelar</a>

</form>

@endsection