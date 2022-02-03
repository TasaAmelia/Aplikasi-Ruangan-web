@extends('layouts.layouts_main')

@section("container")
<section class="section">
    <div class="section-header">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
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
                                    {{-- <th>Gedung</th> --}}
                                    <th>Ruangan</th>
                                    <th>Peminjam</th>
                                    <th>Jenis Pinjaman</th>
                                    <th>Tgl awal pinjam</th>
                                    <th>Tgl akhir pinjam</th>
                                    <th>Tujuan Peminjaman</th>
                                    <th>Status</th>
                                    <th>Ket Peminjaman</th>
                                    @can('admin')
                                    <th>Action</th>
                                    @endcan
                                </tr>
                                @foreach ($rents as $rent)
                                <tr>
                                    <td>{{ $rents->firstItem() + $loop->index }}</td>
                                    {{-- <td>{{ $rent->building->buildingname }}</td> --}}
                                    <td>{{ $rent->room->roomname }}</td>
                                    <td>{{ $rent->user->username }}</td>
                                    <td>{{ $rent->jenis_pinjam }}</td>
                                    <td>{{ $rent->start }}</td>
                                    <td>{{ $rent->end }}</td>
                                    <td>{{ $rent->title }}</td>
                                    @if ($rent->status == 'Accept')
                                    <td class="badge badge-success mt-2">{{ $rent->status }}</td>
                                    @elseif($rent->status == 'Reject')
                                    <td class="badge badge-danger mt-2">{{ $rent->status }}</td>
                                    @elseif($rent->status == 'Pending')
                                    <td class="badge badge-warning mt-2">{{ $rent->status }}</td>
                                    @endif
                                    <td>{{ $rent->keterangan }}</td>
                                    @can('admin')
                                    <td>
                                        {{-- <form action="/rental/{{ $rent->id }}", method="post" class="d-inline">
                                            @method('put')
                                            @csrf
                                            @if ($rent->status == 'Accept')
                                                <button type="submit" class="btn btn-secondary" disabled><i
                                                class="fas fa-check"></i></button>
                                            @else
                                                <button type="submit" class="btn btn-success"><i
                                                class="fas fa-check"></i></button>
                                            @endif --}}
                                            {{-- <a href="/rental/{{ $rent->id }}" class="btn btn-success"><i
                                                class="fas fa-check"></i></a> --}}
                                            {{-- </form> --}}
                                            @if ($rent->status == 'Accept')
                                            <a href=# class="btn btn-secondary approve disabled" data-id="{{ $rent->id }}"><i class="fas fa-check"></i></a>
                                            <a href=# class="btn btn-danger reject disabled" data-id="{{ $rent->id }}"><i class="fas fa-times"></i></a>
                                            @elseif($rent->status == 'Reject')
                                            <a href=# class="btn btn-secondary approve disabled" data-id="{{ $rent->id }}"><i class="fas fa-check"></i></a>
                                            <a href=# class="btn btn-danger reject disabled" data-id="{{ $rent->id }}"><i class="fas fa-times"></i></a>
                                            @else
                                            <a href=# class="btn btn-success approve" data-id="{{ $rent->id }}"><i class="fas fa-check"></i></a>
                                            <a href=# class="btn btn-danger reject" data-id="{{ $rent->id }}"><i class="fas fa-times"></i></a>
                                            @endif
                                        </td>
                                        @endcan
                                                {{-- <a href={{ "/ruanganDelete/" .$rent['id'] }} class="btn btn-danger trigger--fire-modal-7"
                                            onclick="return confirm('Are you sure want to delete ?')"><i
                                            class="fas fa-trash"></i></a> --}}
                                        </td>
                                    {{-- <td><a class="btn btn-success" id="btnCheck"><i
                                        class="fas fa-check"></i></a> --}}
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">{{ $rents->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
        
    <script>
        $('.reject').click( function(){
            var dataID = $(this).attr('data-id');
            var status = "Reject";
            Swal.fire({
            input: 'textarea',
            inputLabel: 'Keterangan',
            inputPlaceholder: 'Type your message here...',
            inputAttributes: {
                'aria-label': 'Type your message here'
            },
            showCancelButton: true
            }).then((keterangan) =>{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/rental/"+dataID+"",
                    data: {
                        status: status,
                        message: keterangan.value
                    },
                    success: function(response){
                        Swal.fire('Berhasil', 'success')
                        location.reload()
                    }
                })
            })
        })

        $('.approve').click( function(){
                var dataID = $(this).attr('data-id');
                var keterangan = "Diterima";
                var status = "Accept";
                console.log(status)
                console.log(keterangan)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "PUT",
                    url: "/rental/"+dataID+"",
                    data: {
                        status: status,
                        message: keterangan
                    },
                    success: function(response){
                        Swal.fire('Berhasil', 'success')
                        location.reload()
                    }
                })
                // window.location = "/rental/"+dataID+"/edit";
                // console.log(keterangan.value)
            })


    </script>

</section>

@endsection
