<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
        {
            $search = $request->input('search');

            $tasks = Task::when($search, function($query, $search){
                return $query->where('title', 'ilike', "%$search%");
            })->paginate(5);

            return view('tasks.index', compact('tasks', 'search'));
        }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index');

        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
            'is_done' => 'nullable|boolean',
        ]);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return redirect()->route('tasks.index');

        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
            'is_done' => 'nullable|boolean',
        ]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}

