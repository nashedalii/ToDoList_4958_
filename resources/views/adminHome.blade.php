@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
        

            <h1 class="my-4">Welcome Admin</h1>
            <p class="lead">Manage your application efficiently and effectively</p>
        </div>
    </div>

    <div class="row justify-content-center my-5">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">User Management</h5>
                    <p class="card-text">Edit, and remove users from your application.</p>
                    <a href="{{ route('manage-accounts') }}" class="btn btn-primary">Go to User Management</a>
                </div>
            </div>
        </div>
      
    </div>

    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Admin Dashboard</h4>
                    <p class="card-text">Keep track of your application’s activities and performance.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Monitor user activities</li>
                        <li class="list-group-item">Analyze data trends</li>
                        <li class="list-group-item">Receive real-time notifications</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
