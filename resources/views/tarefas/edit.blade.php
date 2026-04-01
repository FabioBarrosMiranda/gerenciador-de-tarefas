@extends('layouts.app')
@section('content')

<h2>Editar Tarefa</h2>

<form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control" value="{{ $tarefa->titulo }}">
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control">{{ $tarefa->descricao }}</textarea>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pendente" {{ $tarefa->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="em_andamento" {{ $tarefa->status == 'em_andamento' ? 'selected' : '' }}>Em andamento</option>
            <option value="concluida" {{ $tarefa->status == 'concluida' ? 'selected' : '' }}>Concluída</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Prioridade</label>
        <select name="prioridade" class="form-control">
            <option value="baixa" {{ $tarefa->prioridade == 'baixa' ? 'selected' : '' }}>Baixa</option>
            <option value="media" {{ $tarefa->prioridade == 'media' ? 'selected' : '' }}>Média</option>
            <option value="alta" {{ $tarefa->prioridade == 'alta' ? 'selected' : '' }}>Alta</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Data de Entrega</label>
        <input type="date" name="data_entrega" class="form-control" value="{{ $tarefa->data_entrega }}">
    </div>

    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Cancelar</a>

</form>

@endsection