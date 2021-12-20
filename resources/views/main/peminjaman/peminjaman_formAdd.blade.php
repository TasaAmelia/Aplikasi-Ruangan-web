@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>Add Peminjaman</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/peminjamanList">{{ $title }}</a></div>
            <div class="breadcrumb-item">Add Peminjaman</div>
        </div>
    </div>

    <div class="section-body">
        <form action="/peminjamanAdd" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="nama_ruangan">Nama Ruangan</label>
                            <select class="form-control @error('nama_ruangan') is-invalid @enderror" name="nama_ruangan"
                                id="nama_ruangan" value="{{ old('nama_ruangan') }}"  required autofocus>
                                @foreach($peminjaman as $data)
                                <option>{{ $data->ruangan->nama_ruangan }}</option>
                                @endforeach
                            </select>
                            @error('nama_ruangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="jenis_pinjaman">Jenis Pinjaman</label>
                            <select name="jenis_pinjaman" id="jenis_pinjaman"
                                class="form-control @error('jenis_pinjaman') is-invalid @enderror">
                                <option value="JangkaPendek" @if (old('jenis_pinjaman')=="Jangka Pendek" ) {{ 'selected' }} @endif>Jangka Pendek
                                </option>
                                <option value="JangkaPanjang" @if (old('jenis_pinjaman')=="Jangka Panjang" ) {{ 'selected' }} @endif>
                                    Jangka Panjang</option>
                            </select>
                            @error('jenis_pinjaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama_peminjam">Nama Peminjam</label>
                            <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror"
                                name="nama_peminjam" id="nama_peminjam" placeholder="nama peminjam" value="{{ old('nama_peminjam') }}"
                                required>
                            @error('nama_peminjam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="tgl_awal_pinjam">Tanggal Awal Pinjam</label>
                            <input type="datetime-local" class="form-control @error('tgl_awal_pinjam') is-invalid @enderror"
                                name="tgl_awal_pinjam" id="tgl_awal_pinjam" placeholder="00-00-0000" value="{{ old('tgl_awal_pinjam') }}"
                                required autofocus>
                            @error('tgl_awal_pinjam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="tgl_akhir_pinjam">Tanggal Akhir Pinjam</label>
                            <input type="datetime-local" class="form-control @error('tgl_akhir_pinjam') is-invalid @enderror"
                                name="tgl_akhir_pinjam" id="tgl_akhir_pinjam" placeholder="00-00-0000" value="{{ old('tgl_akhir_pinjam') }}"
                                required autofocus>
                            @error('tgl_akhir_pinjam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="body">Keterangan Peminjaman</label>
                            <input id="body" type="hidden" name="body">
                            <trix-editor input="body"></trix-editor>
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
