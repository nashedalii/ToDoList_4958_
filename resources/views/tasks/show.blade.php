@extends('layouts.app2')

@section('content')
<div class="container mx-auto py-4">
    <h1 class="text-3xl mb-4">{{ $task->name }}</h1>
    
    <div class="bg-white p-4 rounded shadow">
        <p>{{ $task->description }}</p>
        <p>Due: {{ $task->due_date }}</p>
        <p>Priority: {{ $task->priority }}</p>
    </div>
    
    <a href="{{ route('box') }}" class="bg-lime-500 text-white p-2 rounded mt-4 inline-block">Back to Tasks</a>
</div>
@endsection
