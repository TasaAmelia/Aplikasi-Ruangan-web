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
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
            <button type="button" class="close" data-dismiss="alert">
                <span>x</span>
            </button>
            <strong>{{ session('statusDelete') }}</strong>
            </div>
        </div>
          {{-- <h6 class="alert alert-danger alert-dismissible">{{ session('statusDelete') }}</h6> --}}
      @endif

      @if (session('statusAdd'))
      <div class="alert alert-primary alert-dismissible show fade">
          <div class="alert-body">
            <button type="button" class="close" data-dismiss="alert">
                <span>x</span>
            </button>
            <strong>{{ session('statusAdd') }}</strong>
          </div>
      </div>
          {{-- <h6 class="alert alert-primary alert-dismissible">{{ session('statusAdd') }}</h6> --}}
      @endif

      @if (session('statusUpdate'))
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
            <button type="button" class="close" data-dismiss="alert">
                <span>x</span>
            </button>
            <strong>{{ session('statusUpdate') }}</strong>
            </div>
        </div>
          {{-- <h6 class="alert alert-warning">{{ session('statusUpdate') }}</h6> --}}
      @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/rental/create" class="btn btn-primary">
                            Pinjam Ruangan
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Gedung</th>
                                    <th>Nama Ruangan</th>
                                    <th>Jenis Pinjaman</th>
                                    {{-- <th>Nama Peminjam</th> --}}
                                    <th>Tgl awal pinjam</th>
                                    <th>Tgl akhir pinjam</th>
                                    <th>Ket Peminjaman</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($rents as $rent)
                                <tr>
                                    <td>{{ $rents->firstItem() + $loop->index }}</td>
                                    <td>{{ $rent->building->buildingname }}</td>
                                    <td>{{ $rent->room->roomname }}</td>
                                    <td>{{ $rent->jenis_pinjam }}</td>
                                    <td>{{ $rent->tanggal_awal }}</td>
                                    <td>{{ $rent->tanggal_akhir }}</td>
                                    <td>{{ $rent->keterangan }}</td>
                                    <td><a class="btn btn-success statButton" id="btnCheck"><i
                                        class="fas fa-check"></i></a>
                                    <p id="status"></p>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let btnCheck = document.querySelector('#btnCheck');
        let statusOk = document.querySelector('#status');

        btnCheck.addEventListener('click', () =>{
            setTimeout(() => {
                btnCheck.style.display = "none";
                statusOk.innerText = 'Accepted'
            }, 50);
        })

    </script>

</section>

@endsection