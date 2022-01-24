@extends('layouts.layouts_main')
@section('container')

<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/userList">{{ $mainTitle }}</a></div>
            <div class="breadcrumb-item">{{ $title }}</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">{{ $title }}</h2>

        <form action="/user" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
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
                        <div class="form-group col-md-6">
                            <label for="usertype">Usertype</label>
                            <select name="usertype" id="usertype"
                                class="form-control @error('usertype') is-invalid @enderror">
                                <option value="Admin" @if (old('usertype')=="Admin" ) {{ 'selected' }} @endif>Admin
                                </option>
                                <option value="SuperAdmin" @if (old('usertype')=="SuperAdmin" ) {{ 'selected' }} @endif>
                                    Super Admin</option>
                                <option value="User" @if (old('usertype')=="User" ) {{ 'selected' }} @endif>
                                    User</option>
                            </select>
                            @error('usertype')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="instansi">Instansi</label>
                            <input type="text" class="form-control @error('instansi') is-invalid @enderror"
                                name="instansi" id="instansi" placeholder="Instansi" value="{{ old('instansi') }}"
                                required>
                            @error('instansi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
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

    @endsection
