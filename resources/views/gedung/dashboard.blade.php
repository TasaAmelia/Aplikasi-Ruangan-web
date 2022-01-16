@extends('layouts.layouts_main')

@section("container")
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/">{{ $title }}</a></div>
            <div class="breadcrumb-item">Dashboard</div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total User</h4>
              </div>
              <div class="card-body">
                {{ $user }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Gedung</h4>
              </div>
              <div class="card-body">
                {{ $gedung }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Ruangan</h4>
              </div>
              <div class="card-body">
                {{ $ruangan }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-retweet"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Ruangan Yang Dipinjam</h4>
              </div>
              <div class="card-body">
                {{ $pinjam }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <canvas id="myChart"></canvas>
        </div>
        <div class="col">
          <canvas id="myChart2"></canvas>
        </div>
        <div class="col">
          <canvas id="myChart3"></canvas>
        </div>
      </div>
      

      <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
      <script>
        const data = {
          labels: {!! json_encode($months) !!},
          datasets: [{
            label: 'Banyak Ruangan Yang Dipinjam',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: {!! json_encode($monthCount) !!},
          }]
        };
      
        const config = {
          type: 'bar',
          data: data,
          options: {}
        };
      </script>
      <script>
        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
      </script>

      <script>
        const data2 = {
          labels: {!! json_encode($nama) !!},
          datasets: [{
            label: 'Ruangan yang sering dipinjam',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: {!! json_encode($jumlah) !!},
          }]
        };

        const config2 = {
          type: 'bar',
          data: data2,
          options: {}
        };
      </script>
      <script>
        const myChart2 = new Chart(
          document.getElementById('myChart2'),
          config2
        );
      </script>

      <script>
        const data3 = {
          labels: {!! json_encode($namaUser) !!},
          datasets: [{
            label: 'User yang sering meminjam',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: {!! json_encode($jumlahPinjam) !!},
          }]
        };

        const config3 = {
          type: 'bar',
          data: data3,
          options: {}
        };
      </script>
      <script>
        const myChart3 = new Chart(
          document.getElementById('myChart3'),
          config3
        );
      </script>
      
      

    </section>


@endsection
