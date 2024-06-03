<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $priority = $request->query('priority');
        if ($priority) {
            $tasks = Task::where('priority', $priority)->get();
        } else {
            $tasks = Task::all();
        }
        return view('box', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => 'nullable|string',
        ]);

        Task::create($request->all());

        return redirect()->route('box')->with('success', 'Task created successfully.');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }
    

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('box')->with('success', 'Task deleted successfully.');
    }

    public function todoList(Request $request)
    {
        $priority = $request->query('priority');
        if ($priority) {
            $tasks = Task::where('priority', $priority)->get();
        } else {
            $tasks = Task::all();
        }
        return view('todo-list', compact('tasks', 'priority'));
    }
}
