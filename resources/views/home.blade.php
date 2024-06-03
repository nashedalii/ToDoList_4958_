@extends('layouts.app2')

@section('content')
<div class="container">
  
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h2 class="mb-0">Welcome, {{ Auth::user()->name }}!</h2>
                
</div>
@endsection
