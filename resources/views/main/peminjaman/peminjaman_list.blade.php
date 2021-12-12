@extends('layouts.layouts_main')

@section("container")
<section class="section">
    <div class="section-header">
        <h1>List Peminjaman</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/#">{{ $title }}</a></div>
            <div class="breadcrumb-item">List Peminjaman</div>
        </div>
    </div>

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
                    <div class="card-header">
                        <a href="/peminjamanAdd" class="btn btn-primary">
                            Create New Peminjaman
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Ruangan</th>
                                    <th>Jenis Pinjaman</th>
                                    <th>Nama Peminjam</th>
                                    <th>Tgl awal pinjam</th>
                                    <th>Tgl akhir pinjam</th>
                                    <th>Ket Peminjaman</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="" class="btn btn-warning"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="" class="btn btn-danger"
                                            onclick="return confirm('Are you sure want to delete ?')"><i
                                                class="fas fa-trash"></i></a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
