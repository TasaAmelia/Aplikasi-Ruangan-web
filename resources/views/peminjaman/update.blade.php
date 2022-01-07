@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <h1>Form Update Peminjaman</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/peminjamanList">{{ $title }}</a></div>
            <div class="breadcrumb-item">Form Update Peminjaman</div>
        </div>
    </div>

    <div class="section-body">
        <form action="/rental/{{ $rental->id }}" method="POST">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="gedung_id">Nama Gedung</label>
                            <input type="text" class="form-control @error('gedung_id') is-invalid @enderror"
                                name="gedung_id" id="gedung_id" value="{{ old('gedung_id', $rental->building->buildingname) }}"
                                disabled>
                            @error('gedung_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="room_id">Nama Ruangan</label>
                            <input type="text" class="form-control @error('room_id') is-invalid @enderror"
                                name="room_id" id="room_id" value="{{ old('room_id', $rental->room->roomname) }}"
                                disabled>
                            @error('room_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="jenis_pinjaman">Jenis Pinjaman</label>
                            <input type="text" class="form-control @error('jenis_pinjaman') is-invalid @enderror"
                                name="jenis_pinjaman" id="jenis_pinjaman" value="{{ old('jenis_pinjaman', $rental->jenis_pinjam) }}"
                                disabled>
                            @error('jenis_pinjaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="tgl_awal_pinjam">Tanggal Awal Pinjam</label>
                            <input type="text" class="form-control @error('tgl_awal_pinjam') is-invalid @enderror"
                                name="tgl_awal_pinjam" id="tgl_awal_pinjam" value="{{ old('tgl_awal_pinjam', $rental->tanggal_awal) }}"
                                disabled>
                            @error('tgl_awal_pinjam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="tgl_akhir_pinjam">Tanggal Akhir Pinjam</label>
                            <input type="text" class="form-control @error('tgl_akhir_pinjam') is-invalid @enderror" 
                                name="tgl_akhir_pinjam" id="tgl_akhir_pinjam" value="{{ old('tgl_akhir_pinjam', $rental->tanggal_akhir) }}"
                                disabled>
                            @error('tgl_akhir_pinjam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="description">Keterangan Peminjaman</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" id="description" value="{{ old('description', $rental->keterangan) }}"
                                disabled>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <input type="hidden" class="form-control @error('status') is-invalid @enderror"
                        name="status" value="Accept">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">Terima</button>
            </div>
        </form>
    </div>

</section>


@endsection