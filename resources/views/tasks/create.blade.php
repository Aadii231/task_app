<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Task</title>
</head>
<body>
    <br>
    <br>
<div class="container">
    <h1>Create Task</h1>
    <br>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
    
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
            </div>
    
            <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <select name="priority" class="form-select" id="priority">
                    <option value="1">Low</option>
                    <option value="2">Medium</option>
                    <option value="3">High</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select" id="status">
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="in_progress">Completed</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control" id="due_date" value="{{ old('due_date') }}">
            </div>
    
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>