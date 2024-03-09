<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;

class taskController extends Controller
{
    public function index(Request $request)
        {
            $tasks = Task::query();
    
            $sort = $request->get('sort');
            if ($sort == 'priority') {
                $tasks->orderBy('priority');
            } elseif ($sort == 'due_date') {
                $tasks->orderBy('due_date');
            }
    
            $status = $request->get('status');
            if ($status) {
                $tasks->where('status', $status);
            }
    
            $tasks = $tasks->paginate(10);

            return view('tasks.index', compact('tasks'));

        }

public function create()
{
    return view('tasks.create');
}

public function store(Request $request)
{
    $this->validate($request, [
        'title' => 'required|max:255',
        'description' => 'required',
        'priority' => 'required|integer|between:1,3',
        'status' => 'required|in:pending,in_progress,completed',
        'due_date' => 'nullable|date',
    ]);

    $task = Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'priority' => $request->priority,
        'status' => $request->status,
        'due_date' => $request->due_date,
    ]);

    return redirect()->route('tasks.index');
}
    
public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
    $this->validate($request, [
        'title' => 'required|max:255',
        'description' => 'required',
        'priority' => 'required|integer|between:1,3',
        'status' => 'required|in:pending,in_progress,completed',
        'due_date' => 'nullable|date',
    ]);

    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'priority' => $request->priority,
        'status' => $request->status,
        'due_date' => $request->due_date,
    ]);

    return redirect()->route('tasks.index');
}
public function destroy(Task $task)
{
    $task->delete();

    return redirect()->route('tasks.index');
}

}
