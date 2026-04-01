@extends('layouts.app')
@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Minhas Tarefas</h2>
        <a href="{{ route('tarefas.create') }}" class="btn btn-primary">+ Nova Tarefa</a>
    </div>

    <form method="GET" action="{{ route('tarefas.index') }}" class="mb-3">
        <div class="d-flex gap-2">
            <select name="status" class="form-control w-auto">
                <option value="">Todos</option>
                <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="em_andamento" {{ request('status') == 'em_andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="concluida" {{ request('status') == 'concluida' ? 'selected' : '' }}>Concluída</option>
            </select>
            <button type="submit" class="btn btn-secondary">Filtrar</button>
        </div>
    </form>

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

                        @if($tarefa->status != 'concluida')
                            <form action="{{ route('tarefas.concluir', $tarefa->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-success">Concluir</button>
                            </form>
                        @endif

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