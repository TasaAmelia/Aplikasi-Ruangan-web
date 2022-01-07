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

        <form action="/ruangan/{{ $data->id }}" method="POST">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{ $data['id'] }}">
                        <div class="form-group col-md-6">
                            <label for="roomname">Nama Ruangan</label>
                            <input type="text" class="form-control @error('roomname') is-invalid @enderror"
                                name="roomname" id="roomname" placeholder="Nama Ruangan" value="{{ old('roomname', $data->roomname) }}"
                                required autofocus>
                            @error('roomname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="roomtype_id">Jenis Ruangan</label>
                            <select class="form-control @error('roomtype_id') is-invalid @enderror" 
                            name="roomtype_id" id="roomtype_id" value="{{ old('roomtype_id') }}"
                            required>
                            @foreach($roomtypes as $roomtype)
                                <option value="{{ $roomtype->id }}">{{ $roomtype->roomtypename }}</option>
                                @endforeach
                              </select>
                              @error('roomtype_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="building_id">Gedung</label>
                            <select class="form-control @error('building_id') is-invalid @enderror" 
                            name="building_id" id="building_id" value="{{ old('building_id') }}"
                            required autofocus>
                            @foreach($buildings as $building)
                                <option value="{{ $building->id }}">{{ $building->buildingname }}</option>
                                @endforeach
                              </select>
                              @error('building_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="roomdescription">Keterangan</label>
                            <input type="text" class="form-control @error('roomdescription') is-invalid @enderror"
                                name="roomdescription" id="roomdescription" placeholder="Keterangan" value="{{ old('roomdescription', $data->roomdescription) }}"
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