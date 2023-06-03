@extends('layouts.main')

@section('container')

<form action="{{route('Supir.store-supir')}}" method="POST">
  @csrf
  <h3>Data Supir</h3>
  <div class="mb-3">
    <label for="exampleInputid" class="form-label">Nama</label>
    <input name="nama" type="text" class="form-control" id="nama">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input name="alamat" type="text" class="form-control" id="alamat">
  </div>
  <div>
    <label for="no_tlp" class="form-label">Telepon</label>
    <input name="no_telp" type="text" class="form-control" id="no_telp">
  </div><br>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

  @endsection