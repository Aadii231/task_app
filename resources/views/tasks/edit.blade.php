<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" id="title" class="form-input mt-1 block w-full" value="{{ $task->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" class="form-input mt-1 block w-full">{{ $task->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                        <select name="priority" id="priority" class="form-select mt-1 block w-full">
                            <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>Low</option>
                            <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>Medium</option>
                            <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="form-select mt-1 block w-full">
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                        <input type="date" name="due_date" id="due_date" class="form-input mt-1 block w-full" value="{{ $task->due_date }}">
                    </div>

                    <x-primary-button class="mt-4" type="submit">
                        Update Task
                    </x-primary-button></a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
