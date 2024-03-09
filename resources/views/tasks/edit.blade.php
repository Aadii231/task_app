<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br>
    <br>
    <div class="container">
        <h1>Edit Task</h1>
    
      <br>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}">
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description">{{ $task->description }}</textarea>
            </div>
    
            <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <select name="priority" class="form-select" id="priority">
                    <option value="1" @if($task->priority == 1) selected @endif>Low</option>
                    <option value="2" @if($task->priority == 2) selected @endif>Medium</option>
                    <option value="3" @if($task->priority == 3) selected @endif>High</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" id="status">
                    <option value="pending" @if($task->status == 'pending') selected @endif>Pending</option>
                    <option value="in_progress" @if($task->status == 'in_progress') selected @endif>In Progress</option>
                    <option value="completed" @if($task->status == 'completed') selected @endif>Completed</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control" id="due_date" value="{{ $task->due_date }}">
            </div>
    
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>