@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1 class="display-4 my-4">Welcome Admin</h1>
            <p class="lead">Manage your application efficiently and effectively</p>
        </div>
    </div>

    <div class="row justify-content-center my-5">
        <!-- Card 1 -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-users-cog fa-3x text-primary"></i>
                    </div>
                    <h5 class="card-title">User Management</h5>
                    <p class="card-text">Edit, and remove users from your application.</p>
                    <a href="{{ route('manage-accounts') }}" class="btn btn-primary btn-block">Go to User Management</a>
                </div>
            </div>
        </div>
      
    </div>

    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="card-title">Admin Dashboard</h4>
                    <p class="card-text">Keep track of your application’s activities and performance.</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-eye mr-2 text-primary"></i>Manage Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
