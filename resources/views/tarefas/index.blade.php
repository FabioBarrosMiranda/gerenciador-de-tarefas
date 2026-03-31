@extends('layouts.app')
@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Minhas Tarefas</h2>
        <a href="{{ route('tarefas.create') }}" class="btn btn-primary">+ Nova Tarefa</a>
    </div>


    <table class="table table-bordered table-hover bg-white">
        <thead class="table-dark">
            <tr>
                <th>Título</th>
                <th>Status</th>
                <th>Prioridade</th>
                <th>Data de Entrega</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->titulo }}</td>
                    <td>{{ $tarefa->status }}</td>
                    <td>{{ $tarefa->prioridade }}</td>
                    <td>{{ $tarefa->data_entrega ?? '—' }}</td>
                    <td>
                        <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Nenhuma tarefa cadastrada ainda.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection