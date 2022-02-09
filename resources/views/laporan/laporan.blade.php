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
      <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Jumlah Ruangan Yang Dipinjam</h4>
                    </div>
                    <div class="card-body">
                        <form action="laporan/print">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="jangka">Jangka Waktu</label>
                                    {{-- <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        name="nama_ruangan" id="nama_ruangan" placeholder="J000" value="{{ old('nama_ruangan') }}"
                                        required autofocus> --}}
                                    <select name="jangka" id="jangka" class="form-control @error('jangka') is-invalid @enderror" onChange="myNewFunction(this);" required>
                                        <option hidden>Pilih Jangka Waktu</option>
                                        <option value="hari">Hari</option>
                                        <option value="bulan">Bulan</option>
                                        <option value="tahun">Tahun</option>
                                    {{-- @foreach ($buildings as $building)
                                        <option value="{{ $building->id }}">{{ $building->buildingname }}</option>
                                    @endforeach --}}
                                    </select>
                                    @error('jangka')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8" id="bulan">
                                    <label for="bulan">Bulan</label>
                                    <select name="bulan" class="form-control @error('bulan') is-invalid @enderror">
                                        <option hidden>Pilih Bulan</option>
                                        @foreach ($getMonths as $num => $months)
                                        <option value="{{ $getMonthsNum[$num] }}">{{ $months }}</option>
                                        @endforeach
                                    </select>
                                    @error('bulan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-8" id="tahun">
                                    <label for="tahun">Tahun</label>
                                    <select name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror">
                                    <option hidden>Pilih Tahun</option>
                                        @foreach ($getYears as $years)
                                        <option value="{{ $years }}">{{ $years }}</option>
                                        @endforeach
                                    </select>
                                    @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-8" id="hari">
                                    <label for="hari">Tanggal Pinjam</label>
                                    <input type="date" class="form-control @error('hari') is-invalid @enderror" 
                                        name="hari" id="hari" placeholder="00-00-0000" value="{{ old('hari') }}">
                                    @error('hari')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit" id="submit"><i class="fas fa-print"></i>  Print</button>
                            {{-- <a href="/laporan/print" class="btn btn-success">Print</a> --}}
                        </form>
                    </div>
                    {{-- <div class="d-flex justify-content-center">{{ $buildings->links() }} </div> --}}
                </div>
            </div>
        </div>
    </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

<script>
    var jangka = document.getElementById("jangka");
    var bulan = document.getElementById("bulan");
    var tahun = document.getElementById("tahun");
    var hari = document.getElementById("hari");
    bulan.style.display = 'none'
    hari.style.display = 'none'
    tahun.style.display = 'none'

    function myNewFunction(sel) {
    var a = sel.options[sel.selectedIndex].text;
        if(a == "Bulan"){
            bulan.style.display = ''
            tahun.style.display = ''
            hari.style.display = 'none'
        }
        else if(a == "Tahun"){
            tahun.style.display = ''
            bulan.style.display = 'none'
            hari.style.display = 'none'
        }
        else if(a == "Hari"){
            tahun.style.display = 'none'
            bulan.style.display = 'none'
            hari.style.display = ''
        }
    }

    $(document).ready(function(){
        $("form").submit(function(e){

            e.preventDefault();
            var hari = $("input[name=hari]").val();
            var bulan = $("select[name=bulan]").val();
            var tahun = $("select[name=tahun]").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:"laporan/print",
                data: {
                    hari: hari,
                    bulan: bulan,
                    tahun: tahun
                },
                xhrFields: {
                    responseType: 'blob'
                },
                success:function(response){
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "data.pdf";
                    link.click();
                    location.reload();
                },
                error: function(blob){
                    console.log(blob);
                }
            });
        });
    });

</script>

@endsection