@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>Laporan</h1>

    </div>

    {{-- body --}}
    <div class="section-body">

        @if (session('statusDelete'))
        <h6 class="alert alert-danger">{{ session('statusDelete') }}</h6>
        @endif

        @if (session('statusAdd'))
        <h6 class="alert alert-primary">{{ session('statusAdd') }}</h6>
        @endif

        @if (session('statusUpdate'))
        <h6 class="alert alert-warning">{{ session('statusUpdate') }}</h6>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <a href="/peminjamanAdd" class="btn btn-primary">
                            Create New Peminjaman
                        </a>
                    </div> --}}
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ruangan</th>
                                    <th>Jenis Pinjaman</th>
                                    <th>Nama Peminjam</th>
                                    <th>Tgl awal pinjam</th>
                                    <th>Tgl akhir pinjam</th>
                                    <th>Ket Peminjaman</th>
                                </tr>
                                {{-- @foreach ($peminjamans as $data)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $data->ruangan->nama_ruangan }}</td>
                                    <td>{{ $data['jenis_pinjaman'] }}</td>
                                    <td>{{ $data['nama_peminjam'] }}</td>
                                    <td>{{ $data['tgl_awal_pinjam'] }}</td>
                                    <td>{{ $data['tgl_akhir_pinjam'] }}</td>
                                    <td>{{ $data['ket_peminjaman'] }}</td>
                                </tr>
                                @endforeach --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection
