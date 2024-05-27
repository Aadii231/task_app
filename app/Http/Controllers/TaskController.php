<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;

class taskController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:edit task',['only'=> ['edit','update']]);
        $this->middleware('permission:create task',['only'=> ['create','store']]);
        $this->middleware('permission:delete task',['only'=> ['destroy']]);
    }
        
    public function index(Request $request)
    {
        $tasks = Task::query();
        $pages=$request->get('page_record',);
    
        $sort = $request->get('sort');
        $order = $request->get('order', 'asc'); 
            
        if ($sort === 'priority' || $sort === 'due_date') 
        {
            $tasks->orderBy($sort, $order);
        }
            
        $status = $request->get('status');
        if ($status) 
        {
            $tasks->where('status', $status);
        }
            
        $tasks = $tasks->paginate($pages);

        return view('tasks.index', compact('tasks'));

    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskStoreRequest  $request)
    {
        {
            $task = Task::create($request->validated());
            
            return redirect()->route('tasks.index');
        }
    }
    
    public function edit( Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index');
     }
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

}
