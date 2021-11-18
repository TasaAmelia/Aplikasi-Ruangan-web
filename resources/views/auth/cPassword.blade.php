@extends('layouts.layouts_login')

@section('sections')

<div class="card card-primary">
    <div class="card-header">
        <h4>{{ $title }}</h4>
    </div>

    @if (session('CpassError'))
    <h6 class="alert alert-danger">{{ session('CpassError') }}</h6>
    @endif

    @if (session('success'))
    <h6 class="alert alert-info">{{ session('success') }}</h6>
    @endif

    <div class="card-body">
        <form method="POST" action="/changePass">
            @csrf
            <div class="form-group">
                <label for="old_password">Old Password</label>
                <input id="old_password" type="password" class="form-control" name="old_password" tabindex="1" required autofocus>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input id="new_password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                    name="new_password" tabindex="2" required>
                <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input id="confirm_password" type="password" class="form-control" name="confirm_password" tabindex="2"
                    required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Change
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
