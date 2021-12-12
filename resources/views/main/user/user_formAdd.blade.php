@extends('layouts.layouts_main')

@section("container")
<section class="section">
    <div class="section-header">
        <h1>New User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/main/user">User</a></div>
            <div class="breadcrumb-item">New User</div>
        </div>
    </div>
    <div class="section-body">
        <form method="POST" action="/userAdd">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" id="username" placeholder="Username" value="{{ old('username') }}"
                                required autofocus>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="usertype">Usertype</label>
                            <select name="usertype" id="usertype"
                                class="form-control @error('usertype') is-invalid @enderror">
                                <option value="Admin" @if (old('usertype')=="Admin" ) {{ 'selected' }} @endif>Admin
                                </option>
                                <option value="SuperAdmin" @if (old('usertype')=="SuperAdmin" ) {{ 'selected' }} @endif>
                                    SuperAdmin</option>
                            </select>
                            @error('usertype')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="fullname">Fullname</label>
                            <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                name="fullname" id="fullname" placeholder="Fullname" value="{{ old('fullname') }}"
                                required>
                            @error('fullname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>

    </div>
</section>

@endsection
