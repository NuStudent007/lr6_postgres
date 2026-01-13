@extends('layouts.app')

@section('content')

<h2>Редактировать задачу</h2>

<div class="card">
    <div class="card-body">

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text" name="title" class="form-control"
                       value="{{ $task->title }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Описание</label>
                <textarea name="description" class="form-control" rows="3">{{ $task->description }}</textarea>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_done" value="1"
                       {{ $task->is_done ? 'checked' : '' }}>
                <label class="form-check-label">Выполнено</label>
            </div>

            <button class="btn btn-primary">Обновить</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Назад</a>
        </form>

    </div>
</div>

@endsection
