@extends('layouts.layouts_main')

@section("container")
<section class="section">
    <div class="section-header">
        <h1>List User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/userList">{{ $title }}</a></div>
            <div class="breadcrumb-item">List User</div>
        </div>
    </div>

    <div class="section-body">
        {{-- <h2 class="section-title">List User</h2> --}}

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
                        <a href="/userAdd" class="btn btn-primary">
                            Add User
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Usertype</th>
                                    <th>Fullname</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($users as $user )
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user['username'] }}</td>
                                    <td>{{ $user['usertype'] }}</td>
                                    <td>{{ $user['fullname'] }}</td>
                                    <td><a href="{{ "/userUpdate/" .$user['id'] }}" class="btn btn-warning"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href={{ "/userDelete/" .$user['id'] }} class="btn btn-danger"
                                            onclick="return confirm('Are you sure want to delete ?')"><i
                                                class="fas fa-trash"></i></a></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">{{ $users->links() }}</div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
