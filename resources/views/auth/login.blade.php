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

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <p class="fs-3 fw-bold" style="color: #355B3E;">List Planning System (To-Do List)</p>
                                 <p style="color:#58745E">Welcome Back, Please login to your account</p>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example11">Email</label>
                                    <input id="form2Example11" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example22">Password</label>
                                    <input id="form2Example22" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="text-center pt-1 mb-5 pb-1">
                                    <button type="submit" class="btn btn-primary btn-block fa-lg  mb-3 mr-2" style="background-color: #029664;">
                                        {{ __('Log in') }}
                                    </button>
                                    <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                                </div>

                                <div class="d-flex align-items-center justify-content-center pb-4">
                                    <p class="mb-0 me-2">Don't have an account?</p>
                                    <a href="{{ route('register') }}" class="btn btn-outline-light" style="background-color: #029664;">Create new</a>
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
