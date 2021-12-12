@extends('layouts.layouts_main')
@section('container')
<section class="section">
    <div class="section-header">
        <h1>Add Gedung</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/gedungList">{{ $title }}</a></div>
            <div class="breadcrumb-item">Add Gedung</div>
        </div>
    </div>
    <div class="section-body">
        <form action="/gedungAdd" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="buildingname">Nama Gedung</label>
                            <input type="text" class="form-control @error('buildingname') is-invalid @enderror"
                                name="buildingname" id="buildingname" placeholder="Nama Gedung"
                                value="{{ old('buildingname') }}" required autofocus>
                            @error('buildingname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="buildingdescription">Keterangan Gedung</label>
                            <input type="text" class="form-control @error('buildingdescription') is-invalid @enderror"
                                name="buildingdescription" id="buildingdescription" placeholder="Keterangan"
                                value="{{ old('buildingdescription') }}" required>
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
