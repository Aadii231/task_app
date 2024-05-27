<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Task Manager</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold text-center mb-6">Welcome to Task Manager</h1>
        <p class="text-gray-700 text-center mb-6">This is a task management system where you can manage your tasks efficiently.</p>

        @guest
            <div class="text-center">
                <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Login</a>
                <span class="text-gray-500">or</span>
                <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Register</a>
            </div>
        @else
            <div class="text-center">
                <p>Hello, <span class="font-semibold">{{ Auth::user()->name }}</span>!</p>
                <p class="text-gray-700">You are logged in as <span class="font-semibold">{{ Auth::user()->role }}</span>.</p>
                <a href="{{ route('tasks.index') }}" class="block text-blue-600 hover:underline mt-4">Manage your tasks</a>
                <form action="{{ route('logout') }}" method="post" class="mt-4">
                    @csrf
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Logout</button>
                </form>
            </div>
        @endguest
    </div>
</body>
</html>
