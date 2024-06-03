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
        <p>Discover the features that will help you manage your tasks effectively.</p>
    </div>
    
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <img src="img/box.png" class="img-fluid rounded-circle mb-3" alt="Feature Image">
                    <h5 class="card-title">Box</h5>
                    <p class="card-text">Create, update, and organize your tasks effortlessly. Stay on top of your to-dos with our user-friendly interface.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <img src="img/todolist.png" class="img-fluid rounded-circle mb-3" alt="Feature Image">
                    <h5 class="card-title">Todo-List</h5>
                    <p class="card-text">Never miss a deadline. Set reminders and receive notifications to keep you on track with your tasks.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <img src="img/setting.png" class="img-fluid rounded-circle mb-3" alt="Feature Image">
                    <h5 class="card-title">Setting</h5>
                    <p class="card-text">Monitor your progress and complete tasks efficiently. Track your achievements and stay motivated.</p>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
@endsection
