<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task Management System') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container card-body">
                    <form action="{{ route('tasks.index') }}" method="GET">
                        <div class="flex flex-wrap justify-between items-center">
                            <div class="w-full sm:w-48 mb-3 sm:mb-0">
                                <select name="sort" class="form-select" id="sort">
                                    <option value="" {{ empty(request()->get('sort')) ? 'selected' : '' }}>Sort By...</option>
                                    <option value="priority" {{ request()->get('sort') == 'priority' ? 'selected' : '' }}>Priority</option>
                                    <option value="due_date" {{ request()->get('sort') == 'due_date' ? 'selected' : '' }}>Due Date</option>
                                </select>
                            </div>
                            <div class="w-full sm:w-48 mb-3 sm:mb-0">
                                <select name="order" class="form-select" id="order">
                                    <option value="asc" {{ empty(request()->get('order')) ? 'selected' : '' }}>Order By...</option>
                                    <option value="asc" {{ request()->get('order') == 'Ascending' ? 'selected' : '' }}>Ascending</option>
                                    <option value="desc" {{ request()->get('order') == 'Descending' ? 'selected' : '' }}>Descending</option>
                                </select>
                            </div>
                            <div class="w-full sm:w-48 mb-3 sm:mb-0">
                                <select name="status" class="form-select" id="status">
                                    <option value="" {{ empty(request()->get('status')) ? 'selected' : '' }}>Filter By Status...</option>
                                    <option value="pending" {{ request()->get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_progress" {{ request()->get('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ request()->get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                            
                            <div class="w-full sm:w-48 mb-3 sm:mb-0">
                                <label for="page_record" class="block">Records per page</label>
                                <input type="number" name="page_record" id="page_record" class="form-input">
                            </div>
                            <div class="w-full sm:w-48 mb-3 sm:mb-0">
                                <x-primary-button class="mt-4" type="submit">
                                    Filter and Sort
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                    <table class="table-auto w-full">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-4 py-2">Id</th>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Priority</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Due Date</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td class="border px-4 py-2">{{ $task->id }}</td>
                                <td class="border px-4 py-2">{{ $task->title }}</td>
                                <td class="border px-4 py-2">{{ Str::limit($task->description, 50) }}</td>
                                <td class="border px-4 py-2">{{ $task->priority }}</td>
                                <td class="border px-4 py-2">{{ $task->status }}</td>
                                <td class="border px-4 py-2">{{ $task->due_date }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('tasks.edit', $task->id) }}" <x-primary-button class="mt-4" type="submit">
                                        Edit
                                    </x-primary-button>
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure you want to delete this task?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        <a href="{{ route('tasks.create') }}" ><x-primary-button class="mt-4" type="submit">
                            Create Task
                        </x-primary-button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
