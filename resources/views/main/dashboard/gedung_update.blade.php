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

        <form action="/gedungUpdate" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                        <div class="form-group col-md-6">
                            <label for="buildingname">Nama Gedung</label>
                            <input type="text" class="form-control @error('buildingname') is-invalid @enderror"
                                name="buildingname" id="buildingname" placeholder="Nama Gedung" value="{{ old('buildingname', $data->buildingname) }}"
                                required>
                            @error('buildingname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="buildingdescription">Keterangan</label>
                            <input type="text" class="form-control @error('buildingdescription') is-invalid @enderror"
                                name="buildingdescription" id="buildingdescription" placeholder="Keterangan" value="{{ old('buildingdescription', $data->buildingdescription) }}"
                                required>
                            @error('buildingdescription')
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