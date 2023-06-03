@extends('layouts.main')

@section('container')

<form action="{{route('Outlet.update-outlet',$outlet->id)}}" method="POST">
  @csrf
  <h3>Data Outlet</h3>
  <div class="mb-3">
    <label for="nama_outlet" class="form-label">Nama Outlet</label>
    <input name="nama_outlet" type="text" class="form-control" id="nama_outlet" value="{{$outlet->nama_outlet}}">
  </div>
  <div class="mb-3">
    <label for="no_telp" class="form-label">No Telepon</label>
    <input name="no_telp" type="text" class="form-control" id="no_telp" value="{{$outlet->no_telp}}">
  </div>
  <div>
    <label for="lokasi" class="form-label">Lokasi</label>
    <input name="lokasi" type="text" class="form-control" id="lokasi" value="{{$outlet->lokasi}}">
  </div><br>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

  @endsection