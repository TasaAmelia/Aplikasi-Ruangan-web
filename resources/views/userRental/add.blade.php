@extends('layouts.layouts_main')

@section('container')

<section class="section">
    <div class="section-header">
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <h1>Form Add Peminjaman</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/peminjamanList">{{ $title }}</a></div>
            <div class="breadcrumb-item">Form Add Peminjaman</div>
        </div>
    </div>

    <div class="section-body">
        <form action="/rents" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="gedung_id">Nama Gedung</label>
                            {{-- <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="nama_ruangan" id="nama_ruangan" placeholder="J000" value="{{ old('nama_ruangan') }}"
                                required autofocus> --}}
                            <select name="gedung_id" id="gedung_id"class="form-control @error('gedung_id') is-invalid @enderror">
                                <option hidden>Pilih Gedung</option>
                            @foreach ($buildings as $building)
                                <option value="{{ $building->id }}">{{ $building->buildingname }}</option>
                            @endforeach
                            </select>
                            @error('gedung_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="room_id">Nama Ruangan</label>
                            {{-- <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="nama_ruangan" id="nama_ruangan" placeholder="J000" value="{{ old('nama_ruangan') }}"
                                required autofocus> --}}
                            <select name="room_id" id="room_id" class="form-control @error('room_id') is-invalid @enderror">
                            </select>
                            @error('room_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="jenis_pinjaman">Jenis Pinjaman</label>
                            <select name="jenis_pinjaman" id="jenis_pinjaman"
                                class="form-control @error('jenis_pinjaman') is-invalid @enderror">
                                <option value="Jangka Pendek" @if (old('jenis_pinjaman')=="Jangka Pendek" ) {{ 'selected' }} @endif>Jangka Pendek
                                </option>
                                <option value="Jangka Panjang" @if (old('jenis_pinjaman')=="Jangka Panjang" ) {{ 'selected' }} @endif>
                                    Jangka Panjang</option>
                            </select>
                            @error('jenis_pinjaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-8">
                            <label for="nama_peminjam">Nama Peminjam</label>
                            <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror"
                                name="nama_peminjam" id="nama_peminjam" placeholder="nama peminjam" value="{{ old('nama_peminjam') }}"
                                required>
                            @error('nama_peminjam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
                        <div class="form-group col-md-8">
                            <label for="tgl_awal_pinjam">Tanggal Awal Pinjam</label>
                            <input type="datetime-local" class="form-control @error('tgl_awal_pinjam') is-invalid @enderror"
                                name="tgl_awal_pinjam" id="tgl_awal_pinjam" placeholder="00-00-0000" value="{{ old('tgl_awal_pinjam') }}"
                                required autofocus>
                            @error('tgl_awal_pinjam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="tgl_akhir_pinjam">Tanggal Akhir Pinjam</label>
                            <input type="datetime-local" class="form-control @error('tgl_akhir_pinjam') is-invalid @enderror" 
                                name="tgl_akhir_pinjam" id="tgl_akhir_pinjam" placeholder="00-00-0000" value="{{ old('tgl_akhir_pinjam') }}"
                                required autofocus>
                            @error('tgl_akhir_pinjam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label for="description">Tujuan Peminjaman</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" id="description" placeholder="Keterangan Peminjaman" value="{{ old('description') }}"
                                required>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
        $('#gedung_id').on('change', function() {
           var categoryID = $(this).val();
           if(categoryID) {
               $.ajax({
                   url: '/getRoom/'+categoryID,
                   type: "GET",
                   data : {"_token":"{{ csrf_token() }}"},
                   dataType: "json",
                   success:function(data)
                   {
                     if(data){
                        $('#room_id').empty();
                        // $('#nama_ruangan').append('<option hidden>Pilih Ruangan</option>'); 
                        $.each(data, function(key, room){
                            $('select[name="room_id"]').append('<option value="'+ room.id +'">' + room.roomname+ '</option>');
                        });
                    }else{
                        $('#room_id').empty();
                    }
                 }
               });
           }else{
             $('#room_id').empty();
           }
        });
        });

    //     $('.livesearch').select2({
    //     placeholder: 'Select movie',
    //     ajax: {
    //         url: '/ajax-autocomplete-search',
    //         dataType: 'json',
    //         delay: 250,
    //         processResults: function (data) {
    //             return {
    //                 results: $.map(data, function (item) {
    //                     return {
    //                         text: item.roomname,
    //                         id: item.id
    //                     }
    //                 })
    //             };
    //         },
    //         cache: true
    //     }
    // });

    </script>

</section>


@endsection