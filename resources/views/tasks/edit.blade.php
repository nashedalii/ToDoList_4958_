@extends('layouts.app2')

@section('content')

<div class="container mx-auto py-4">
    <h1 class="text-3xl mb-4 font-bold">Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Task Name</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded p-2" value="{{ $task->name }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" id="description" class="w-full border-gray-300 rounded p-2">{{ $task->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="due_date" class="block text-gray-700">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="w-full border-gray-300 rounded p-2" value="{{ $task->due_date }}">
        </div>
        <div class="mb-4 relative">
            <label for="priority" class="block text-gray-700">Priority</label>
            <div class="relative">
                <select name="priority" id="priority" class="w-full border-gray-300 rounded p-2 appearance-none">
                    <option value="Low" {{ $task->priority == 'Low' ? 'selected' : '' }} class="bg-green-200 text-green-800">Low</option>
                    <option value="Medium" {{ $task->priority == 'Medium' ? 'selected' : '' }} class="bg-yellow-200 text-yellow-800">Medium</option>
                    <option value="High" {{ $task->priority == 'High' ? 'selected' : '' }} class="bg-red-200 text-red-800">High</option>
                </select>
                <div id="priority-icons" class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                    <span id="low-icon" class="material-icons-outlined hidden">arrow_downward</span>
                    <span id="medium-icon" class="material-icons-outlined hidden">horizontal_rule</span>
                    <span id="high-icon" class="material-icons-outlined hidden">arrow_upward</span>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('box') }}" class="bg-rose-500 text-white p-2 rounded mr-2">Cancel</a>
            <button type="submit" class="bg-green-500 text-white p-2 rounded">Update Task</button>
        </div>
    </form>
</div>

<script>
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
