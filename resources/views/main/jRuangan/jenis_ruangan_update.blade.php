@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>Update Jenis Ruangan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/jenisruanganList">{{ $title }}</a></div>
            <div class="breadcrumb-item">Update Jenis Ruangan</div>
        </div>
    </div>
    <div class="section-body">
        <form action="/jenisruanganUpdate" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                        <div class="form-group col-md-6">
                            <label for="roomtypename">Nama Jenis Ruangan</label>
                            <input type="text" class="form-control @error('roomtypename') is-invalid @enderror"
                                name="roomtypename" id="roomtypename" placeholder="Nama Jenis Ruangan"
                                value="{{ old('roomtypename', $data->nama_jenis_ruangan) }}" required>
                            @error('roomtypename')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="roomtypedescription">Keterangan Jenis Ruangan</label>
                            <input type="text" class="form-control @error('roomtypedescription') is-invalid @enderror"
                                name="roomtypedescription" id="roomtypedescription" placeholder="Keterangan"
                                value="{{ old('roomtypedescription', $data->ket_jenis_ruangan) }}" required>
                            @error('roomtypedescription')
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
