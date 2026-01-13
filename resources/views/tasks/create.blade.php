@extends('layouts.app')

@section('content')

<h2>Добавить задачу</h2>

<div class="card">
    <div class="card-body">

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Название</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Описание</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_done" value="1">
                <label class="form-check-label">Выполнено</label>
            </div>

            <button class="btn btn-success">Сохранить</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Назад</a>
        </form>

    </div>
</div>

@endsection
