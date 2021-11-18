@extends('layouts.layouts_login')

@section('sections')

<div class="card card-primary">
    <div class="card-header">
        <h4>Login</h4>
    </div>

    @if (session('LoginError'))
    <h6 class="alert alert-danger">
        {{ session('LoginError') }}
    </h6>
    @endif

    <div class="card-body">
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                    name="username" tabindex="1" placeholder="username" required autofocus>
                @error('username')
                <div class="invalid-feedback">
                    {{ 'Please fill in your username' }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" tabindex="2" placeholder="password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ 'please fill in your password' }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                </button>
            </div>
        </form>
        {{-- <div class="mt-5 text-muted text-center">
            Not registered? <a href="/register">Register Now</a>
        </div> --}}

    </div>
</div>

@endsection
