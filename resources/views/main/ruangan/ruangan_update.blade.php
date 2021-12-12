@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>Update Ruangan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/ruanganList">{{ $title }}</a></div>
            <div class="breadcrumb-item">Update Ruangan</div>
        </div>
    </div>
    <div class="section-body">
        <form action="/ruanganUpdate" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                        <div class="form-group col-md-8">
                            <label for="buildingname">Gedung</label>
                            <select class="form-control @error('buildingname') is-invalid @enderror" name="buildingname"
                                id="buildingname" value="{{ old('buildingname') }}" required autofocus>
                                @if (old('buildingname') === $data->gedung->nama_gedung)
                                <option value="{{ $data->gedung->nama_gedung }}" selected>
                                    {{ $data->gedung->nama_gedung }}</option>
                                @else
                                <option value="{{ $data->gedung->nama_gedung}}">{{ $data->gedung->nama_gedung }}
                                </option>
                                @endif
                            </select>
                            @error('buildingname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="roomtypename">Jenis Ruangan</label>
                            <select class="form-control @error('roomtypename') is-invalid @enderror" name="roomtypename"
                                id="roomtypename" value="{{ old('roomtypename') }}" required>
                                @if (old('roomtypename') === $data->jenisRuangan->nama_jenis_ruangan)
                                <option value="{{ $data->jenisRuangan->nama_jenis_ruangan }}" selected>
                                    {{ $data->jenisRuangan->nama_jenis_ruangan }}</option>
                                @else
                                <option value="{{ $data->jenisRuangan->nama_jenis_ruangan }}">
                                    {{ $data->jenisRuangan->nama_jenis_ruangan }}</option>
                                @endif
                            </select>
                            @error('roomtypename')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="roomname">Nama Ruangan</label>
                            <input type="text" class="form-control @error('roomname') is-invalid @enderror"
                                name="roomname" id="roomname" placeholder="Nama Ruangan"
                                value="{{ old('roomname', $data->nama_ruangan) }}" required autofocus>
                            @error('roomname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="roomdescription">Keterangan Ruangan</label>
                            <input type="text" class="form-control @error('roomdescription') is-invalid @enderror"
                                name="roomdescription" id="roomdescription" placeholder="Keterangan"
                                value="{{ old('roomdescription', $data->ket_ruangan) }}" required>
                            @error('roomdescription')
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
