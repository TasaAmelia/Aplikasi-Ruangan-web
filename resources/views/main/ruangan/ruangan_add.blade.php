@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>Add Ruangan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/ruanganList">{{ $title }}</a></div>
            <div class="breadcrumb-item">Add Ruangan</div>
        </div>
    </div>
    <div class="section-body">
        <form action="/ruanganAdd" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="building_id">Gedung</label>
                            <select class="form-control @error('building_id') is-invalid @enderror" name="building_id"
                                id="building_id" required autofocus>
                                <option>--select--</option>
                                @foreach($gedung as $gedung)
                                <option value="{{ $gedung->gedung_id}}">{{ $gedung->nama_gedung }}</option>
                                @endforeach
                            </select>
                            @error('building_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="roomtype_id">Jenis Ruangan</label>
                            <select class="form-control @error('roomtype_id') is-invalid @enderror" name="roomtype_id"
                                id="roomtype_id" required>
                                <option>--select--</option>
                                @foreach($jenis as $jenis)
                                <option value="{{ $jenis->jenis_ruangan_id }}
                                    ">
                                    {{ $jenis->nama_jenis_ruangan }}</option>
                                @endforeach
                            </select>
                            @error('roomtype_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="roomname">Nama Ruangan</label>
                            <input type="text" class="form-control @error('roomname') is-invalid @enderror"
                                name="roomname" id="roomname" placeholder="Nama Ruangan" value="{{ old('roomname') }}"
                                required autofocus>
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
                                value="{{ old('roomdescription') }}" required>
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
