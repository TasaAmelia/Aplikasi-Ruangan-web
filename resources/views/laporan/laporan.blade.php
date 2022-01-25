@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
        <h1>Laporan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">{{ $title }}</div>
            <div class="breadcrumb-item">Laporan</div>
        </div>
      </div>
    </section>
    <div class="section-body">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4>Jumlah Ruangan Yang Dipinjam</h4>
                    </div>
                    <div class="card-body">
                      <a href="/laporan/print" class="btn btn-success mb-4"><i class="fas fa-print"></i>Print Laporan</a>
                      <div class="btn-group mb-4">
                          <a href="#" class="btn btn-primary">Day</a>
                          <a href="#" class="btn btn-primary">Month</a>
                          <a href="#" class="btn btn-primary">Year</a>
                      </div>
                      <div class="table-responsive">
                          <table class="table table-striped" id="tabel_1">
                              <tr>
                                  {{-- <th>No</th> --}}
                                  <th>Bulan</th>
                                  <th>Jumlah Pinjaman</th>
                              </tr>
                              @foreach ($bulan as $i => $bulans)
                                <tr>
                                  <td>{{ $bulans }}</td>
                                  <td>{{ $jumlahBulan[$i] }}</td>
                                </tr>
                                @endforeach
                          </table>
                      </div>
                  </div>
                  {{-- <div class="d-flex justify-content-center">{{ $buildings->links() }} </div> --}}
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4>Ruangan yang Dipinjam</h4>
                    </div>
                    <div class="card-body">
                      <a href="/laporan/print" class="btn btn-success mb-4"><i class="fas fa-print"></i>Print Laporan</a>
                      <div class="table-responsive">
                          <table class="table table-striped">
                              <tr>
                                  {{-- <th>No</th> --}}
                                  <th>Nama Ruangan</th>
                                  <th>Jumlah Pinjaman</th>
                              </tr>
                              @foreach ($ruangan as $j => $ruangans)
                                <tr>
                                  <td>{{ $ruangans }}</td>
                                  <td>{{ $jumlahRuangan[$j] }}</td>
                                </tr>
                                @endforeach
                          </table>
                      </div>
                  </div>
                  {{-- <div class="d-flex justify-content-center">{{ $buildings->links() }} </div> --}}
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4>Instansi Yang Meminjam</h4>
                    </div>
                    <div class="card-body">
                      <a href="/laporan/print" class="btn btn-success mb-4"><i class="fas fa-print"></i>Print Laporan</a>
                      <div class="table-responsive">
                          <table class="table table-striped">
                              <tr>
                                  {{-- <th>No</th> --}}
                                  <th>Nama Instansi</th>
                                  <th>Jumlah Pinjaman</th>
                              </tr>
                              @foreach ($user as $q => $users)
                                <tr>
                                  <td>{{ $users }}</td>
                                  <td>{{ $jumlahPinjam[$q] }}</td>
                                </tr>
                                @endforeach
                          </table>
                      </div>
                  </div>
                  {{-- <div class="d-flex justify-content-center">{{ $buildings->links() }} </div> --}}
              </div>
          </div>
      </div>
  </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
        
    <script>
        $(document).ready( function () {
            $('#tabel_1').DataTable();
        } );

    </script>

</section>

@endsection
