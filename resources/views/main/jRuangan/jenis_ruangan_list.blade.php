@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>List Jenis Ruangan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/jenisruanganList">{{ $title }}</a></div>
            <div class="breadcrumb-item">List Jenis Ruangan</div>
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
                        <a href="/jenisruanganAddForm" class="btn btn-primary">
                            Create New Jenis Ruangan
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jenis Ruangan</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($roomtypes as $roomtype )
                                  <tr>
                                      <td>{{ $roomtype['nama_jenis_ruangan'] }}</td>
                                      <td>{{ $roomtype['ket_jenis_ruangan'] }}</td>
                                      <td><a href="{{ "/" .$roomtype['id'] }}" class="btn btn-warning"><i
                                                  class="fas fa-pencil-alt"></i></a>
                                          <a href={{ "/jenisruanganDelete/" .$roomtype['id'] }} class="btn btn-danger"
                                              onclick="return confirm('Are you sure want to delete ?')"><i
                                                  class="fas fa-trash"></i></a></td>
                                  </tr>
                                  @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end"></div>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection
