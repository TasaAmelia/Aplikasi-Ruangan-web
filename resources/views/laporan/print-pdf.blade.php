<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center">Laporan Peminjaman Ruangan</h3>
    <h5 class="mt-4">Jumlah Ruangan Yang Dipinjam</h5>
    <h6>{{ $jumahrentalbulan }}</h6>
    <h4 class="text-center mt-5">Ruangan Yang Dipinjam</h4>
    <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Ruangan</th>
            <th scope="col">Jumlah Pinjaman</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1?>
          @foreach ($ruangan as $j => $ruangans)
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $ruangans }}</td>
            <td>{{ $jumlahruangan[$j] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <h4 class="text-center mt-5">Instansi Yang Meminjam</h4>

      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Instansi</th>
            <th scope="col">Jumlah Pinjaman</th>
          </tr>
        </thead>
        <tbody>
          <?php $num = 1?>
          @foreach ($user as $i => $users)
          <tr>
            <th scope="row">{{ $num++ }}</th>
            <td>{{ $users }}</td>
            <td>{{ $jumlahpinjam[$i] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>
