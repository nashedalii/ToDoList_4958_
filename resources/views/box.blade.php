@extends('layouts.app2')

@section('content')

<div class="container mx-auto py-4">
    <h1 class="text-3xl mb-4 font-bold">Box</h1>
    <button id="addTaskButton" class="bg-green-500 text-white p-2 rounded mt-1 mb-4">Add Task</button>

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
                    <p>
                        Priority: 
                        <span class="px-2 py-1 rounded {{ $task->priority == 'Low' ? 'bg-green-200 text-green-800' : ($task->priority == 'Medium' ? 'bg-yellow-200 text-yellow-800' : 'bg-red-200 text-red-800') }}">
                            {{ $task->priority }}
                        </span>
                    </p>
                    <div class="flex justify-end mt-2">
                        <a href="{{ route('tasks.show', $task->id) }}" class="bg-lime-500 text-white p-2 rounded mx-2">View</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="bg-blue-500 text-white p-2 rounded mx-2">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-2 rounded">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    <!-- Dark Background Overlay -->
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-10"></div>

    <div id="addTaskModal" class="hidden fixed z-20 inset-0 overflow-y-auto">
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
                    <div class="mb-4 relative">
                        <label for="priority" class="block text-gray-700">Priority</label>
                        <div class="relative">
                            <select name="priority" id="priority" class="w-full border-gray-300 rounded p-2 appearance-none">
                                <option value="Low" class="bg-green-200 text-green-800">Low</option>
                                <option value="Medium" class="bg-yellow-200 text-yellow-800">Medium</option>
                                <option value="High" class="bg-red-200 text-red-800">High</option>
                            </select>
                            <div id="priority-icons" class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <span id="low-icon" class="material-icons-outlined hidden">arrow_downward</span>
                                <span id="medium-icon" class="material-icons-outlined hidden">horizontal_rule</span>
                                <span id="high-icon" class="material-icons-outlined hidden">arrow_upward</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="cancelButton" class="bg-rose-500 text-white p-2 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-green-500 text-white p-2 rounded">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('addTaskButton').addEventListener('click', function() {
    document.getElementById('overlay').classList.remove('hidden');
    document.getElementById('addTaskModal').classList.remove('hidden');
});

document.getElementById('cancelButton').addEventListener('click', function() {
    document.getElementById('overlay').classList.add('hidden');
    document.getElementById('addTaskModal').classList.add('hidden');
});

document.getElementById('priority').addEventListener('change', function() {
    const lowIcon = document.getElementById('low-icon');
    const mediumIcon = document.getElementById('medium-icon');
    const highIcon = document.getElementById('high-icon');
    lowIcon.classList.add('hidden');
    mediumIcon.classList.add('hidden');
    highIcon.classList.add('hidden');
    if (this.value === 'Low') {
        lowIcon.classList.remove('hidden');
    } else if (this.value === 'Medium') {
        mediumIcon.classList.remove('hidden');
    } else if (this.value === 'High') {
        highIcon.classList.remove('hidden');
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const event = new Event('change');
    document.getElementById('priority').dispatchEvent(event);
});
</script>
@endsection
