@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">
                            <div class="text-center">
                                <img src="img/foto.png" style="width: 100px;" alt="logo">
                                <h4 class="mt-1 mb-5 pb-1 fw-bolder" style="color: #355B3E;">SiToDo</h4>
                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <p class="fs-3 fw-bold" style="color: #355B3E;">List Planning System (To-Do List)</p>
                                 <p style="color:#58745E">Welcome Back, Please login to your account</p>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email Address</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                   
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password-confirm">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    
                                </div>

                                <div class="text-center pt-1 mb-5 pb-1">
                                    <button type="submit" class="btn btn-primary btn-block fa-lg  mb-3 mr-2" style="background-color: #029664;">
                                        {{ __('Register') }}
                                    </button>
                                </div>

                                <div class="d-flex align-items-center justify-content-center pb-4">
                                    <p class="mb-0 me-2">Already have an account?</p>
                                    <a href="{{ route('login') }}"  class="btn btn-outline-light" style="background-color: #029664;">Log in</a>
                                </div>
                            </form>

                            @if (session('error'))
                                <div class="alert alert-danger mt-3">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center" style="background-color: #F5DBC4;">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                            <img src="img/foto-login.png" class="img-fluid" alt="Descriptive text about the image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
