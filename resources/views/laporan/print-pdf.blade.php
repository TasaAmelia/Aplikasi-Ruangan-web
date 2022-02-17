<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>

</head>
<body>

    <div class="information">
        <table width="100%">
            <tr>
                <td align="left" style="width: 40%;">
                    <h1>Laporan Peminjaman Ruangan</h1>
                </td>
                <td align="right" style="width: 40%;">
                    <h3>Universitas Langlangbuana</h3>
                    <pre>
                        Jl. Karapitan No.116, Cikawao,
                        Kec. Lengkong, Kota Bandung,
                        Jawa Barat 40261
                    </pre>
                </td>
            </tr>
    
        </table>
    </div>


<br/>

<div class="invoice">
    <h3>Jumlah Ruangan Yang Dipinjam</h3>
    <h3>{{ $getdate }} : {{ $jumahrentalbulan }}</h3>
</div>

<div class="invoice">
    <h3>Ruangan Yang Dipinjam</h3>
    <table width="100%" align="left">
        <thead align="left">
        <tr>
            <th>No</th>
            <th>Nama Ruangan</th>
            <th>Jumlah Pinjaman</th>
        </tr>
        </thead>
        <tbody>
            <?php $no = 1?>
            @foreach ($ruangan as $j => $ruangans)
            <tr>
              <td scope="row">{{ $no++ }}</td>
              <td>{{ $ruangans }}</td>
              <td>{{ $jumlahruangan[$j] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="invoice">
    <h3>Instansi Yang Meminjam</h3>
    <table width="100%" align="left">
        <thead align="left">
        <tr>
            <th>No</th>
            <th>Nama Instansi</th>
            <th>Jumlah Pinjaman</th>
        </tr>
        </thead>
        <tbody>
            <?php $num = 1?>
            @foreach ($user as $i => $users)
            <tr>
                <td scope="row">{{ $num++ }}</td>
                <td>{{ $users }}</td>
                <td>{{ $jumlahpinjam[$i] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0; width:100%">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} Universitas Langlangbuana - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                PinjamRuang 2018
            </td>
        </tr>

    </table>
</div>
</body>
</html>