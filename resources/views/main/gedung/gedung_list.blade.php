@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <h1>List Gedung</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/jenisruanganList">{{ $title }}</a></div>
            <div class="breadcrumb-item">List Gedung</div>
        </div>
      </div>
    </section>
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
                      <a href="/gedungAdd" class="btn btn-primary">
                          Create New Gedung
                      </a>
                  </div>
                  <div class="card-body p-0">
                      <div class="table-responsive">
                          <table class="table table-striped table-md">
                              <tr>
                                  <th>No</th>
                                  <th>Nama Gedung</th>
                                  <th>Keterangan Gedung</th>
                                  <th>Action</th>
                              </tr>
                              @foreach ($buildings as $building )
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $building['nama_gedung'] }}</td>
                                    <td>{{ $building['ket_gedung'] }}</td>
                                    <td><a href="{{ "/gedungUpdate/" .$building['id'] }}" class="btn btn-warning"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href={{ "/gedungDelete/" .$building['id'] }} class="btn btn-danger"
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
    </div>

</section>


@endsection
