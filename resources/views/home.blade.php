@extends('layouts.app2')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <div class="text-center">
        <h1 class="display-4">Welcome to SiToDo, {{ Auth::user()->name }} 🤩</h1>
        <p class="lead">Come on, create your TodoList to make your daily tasks easier!!!</p>
        <hr class="my-4">
        <p>Some of the superior features of this website.</p>
    </div>
    
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <img src="img/box.png" class="img-fluid rounded-circle mb-3" alt="Feature Image">
                    <h5 class="card-title">Box</h5>
                    <p class="card-text">In this box page you can create a new task by entering the task title, description, adding a deadline date and you can also choose the priority, low medium and high.</p>
                    <a href="{{ route('box') }}" class="btn btn-primary">Go to Box</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <img src="img/todolist.png" class="img-fluid rounded-circle mb-3" alt="Feature Image">
                    <h5 class="card-title">Todo-List</h5>
                    <p class="card-text">On this todo-list page, you can select the tasks you have created based on their priority.</p>
                    <a href="{{ route('todo-list') }}" class="btn btn-primary">Go to Todo-List</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <img src="img/setting.png" class="img-fluid rounded-circle mb-3" alt="Feature Image">
                    <h5 class="card-title">Setting</h5>
                    <p class="card-text">In this settings page you can update your profile photo and update your username.</p>
                    <a href="{{ route('settings') }}" class="btn btn-primary">Go to Setting</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
