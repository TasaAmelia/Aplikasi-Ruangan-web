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

        <form action="/userUpdate" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" id="username" placeholder="Username"
                                value="{{ old('username', $data->username) }}" required autofocus>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Usertype</label>
                            <select name="usertype" id="usertype"
                                class="form-control @error('usertype') is-invalid @enderror" required>
                                @if (old('usertype') === $data->usertype)
                                <option value="{{ $data->usertype }}" selected>{{ $data->usertype }}</option>
                                @else
                                <option value="{{ $data->usertype }}">{{ $data->usertype }}</option>
                                @endif
                            </select>
                            @error('usertype')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="username">Fullname</label>
                            <input type="text" class="form-control" name="fullname" id="fullname"
                                placeholder="Fullname @error('fullname') is-invalid @enderror" required
                                value="{{ old('fullname', $data->fullname) }}">
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
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

    @endsection
