@extends('layouts.layouts_main')
@section('container')
<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/userList">{{ $mainTitle }}</a></div>
            <div class="breadcrumb-item">{{ $title }}</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">{{ $title }}</h2>

        <form action="/ruanganAdd" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="roomname">Nama Ruangan</label>
                            <input type="text" class="form-control @error('roomname') is-invalid @enderror"
                                name="roomname" id="roomname" placeholder="Nama Ruangan" value="{{ old('roomname') }}"
                                required autofocus>
                            @error('roomname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="roomtypename">Jenis Ruangan</label>
                            <select class="form-control @error('roomtypename') is-invalid @enderror" 
                            name="roomtypename" id="roomtypename" value="{{ old('roomtypename') }}"
                            required autofocus>
                            @foreach($roomtypes as $roomtype)
                                <option>{{ $roomtype->roomtypename }}</option>
                              </select>
                            @endforeach
                              @error('roomtypename')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="buildingname">Gedung</label>
                            <select class="form-control @error('buildingname') is-invalid @enderror" 
                            name="buildingname" id="buildingname" value="{{ old('buildingname') }}"
                            required autofocus>
                            @foreach($buildings as $building)
                                <option>{{ $building->buildingname }}</option>
                              </select>
                            @endforeach
                              @error('buildingname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="roomdescription">Keterangan</label>
                            <input type="text" class="form-control @error('roomdescription') is-invalid @enderror"
                                name="roomdescription" id="roomdescription" placeholder="Keterangan" value="{{ old('roomdescription') }}"
                                required>
                            @error('roomdescription')
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
    @endsection