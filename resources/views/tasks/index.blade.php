@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Список задач</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        Добавить задачу
    </a>
</div>

<form class="mb-3" method="GET" action="{{ route('tasks.index') }}">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Поиск..."
               value="{{ $search ?? '' }}">
        <button class="btn btn-outline-secondary">Найти</button>
    </div>
</form>

<table class="table table-bordered table-hover bg-white">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Статус</th>
            <th width="220">Действия</th>
        </tr>
    </thead>

    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->title }}</td>

            <td>
                @if($task->is_done)
                    <span class="badge bg-success">Выполнено</span>
                @else
                    <span class="badge bg-danger">Не выполнено</span>
                @endif
            </td>

            <td>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">
                    Редактировать
                </a>

                <form action="{{ route('tasks.destroy', $task->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Удалить задачу?')">
                        Удалить
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div>
    {{ $tasks->links('pagination::bootstrap-5') }}
</div>

@endsection