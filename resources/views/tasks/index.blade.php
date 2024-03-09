<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <br>
    <br>
    <div class="container text-center">
        <h1>Task Management System</h1>
        <br>
        <h2>Task List</h2>   
    </div>
    <div class="container">
        <form action="{{ route('tasks.index') }}" method="GET">
            <div class="row mb-3">
                <div class="col-md-4">
                    <select name="sort" class="form-select" id="sort">
                        <option value="" @if(empty(request()->get('sort'))) selected @endif>Sort By...</option>
                        <option value="priority" @if(request()->get('sort') == 'priority') selected @endif>Priority</option>
                        <option value="due_date" @if(request()->get('sort') == 'due_date') selected @endif>Due Date</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-select" id="status">
                        <option value="" @if(empty(request()->get('status'))) selected @endif>Filter By Status...</option>
                        <option value="pending" @if(request()->get('status') == 'pending') selected @endif>Pending</option>
                        <option value="in_progress" @if(request()->get('status') == 'in_progress') selected @endif>In Progress</option>
                        <option value="completed" @if(request()->get('status') == 'completed') selected @endif>Completed</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filter & Sort</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ Str::limit($task->description, 50) }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                        <a href="{{ route('tasks.edit',$task->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this task?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                        
                    
                    </td>



                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
        </div>
    </div>
    

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>