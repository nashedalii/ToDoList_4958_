@extends('layouts.app2')

@section('content')
<div class="container mx-auto py-4">
    <h1 class="text-3xl mb-4">Box</h1>
    
    @if(session('success'))
        <div class="bg-green-500 text-white p-2 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <ul>
        @foreach($tasks as $task)
            <li class="mb-2">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold">{{ $task->name }}</h2>
                    <p>{{ $task->description }}</p>
                    <p>Due: {{ $task->due_date }}</p>
                    <p>Priority: {{ $task->priority }}</p>
                </div>
            </li>
        @endforeach
    </ul>
    
    <button id="addTaskButton" class="bg-blue-500 text-white p-2 rounded mt-4">Add Task</button>
    
    <div id="addTaskModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-8 rounded shadow-lg max-w-md w-full">
                <h2 class="text-2xl mb-4">Add Task</h2>
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Task Name</label>
                        <input type="text" name="name" id="name" class="w-full border-gray-300 rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700">Description</label>
                        <textarea name="description" id="description" class="w-full border-gray-300 rounded p-2"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="due_date" class="block text-gray-700">Due Date</label>
                        <input type="date" name="due_date" id="due_date" class="w-full border-gray-300 rounded p-2">
                    </div>
                    <div class="mb-4">
                        <label for="priority" class="block text-gray-700">Priority</label>
                        <select name="priority" id="priority" class="w-full border-gray-300 rounded p-2">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="cancelButton" class="bg-gray-500 text-white p-2 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('addTaskButton').addEventListener('click', function() {
    document.getElementById('addTaskModal').classList.remove('hidden');
});

document.getElementById('cancelButton').addEventListener('click', function() {
    document.getElementById('addTaskModal').classList.add('hidden');
});
</script>
@endsection
