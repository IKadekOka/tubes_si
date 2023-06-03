@extends('layouts.main')

@section('container')

<form action="{{route('Kategori.store-kategori')}}" method="POST">
  @csrf
  <h3>Data Kategori</h3>
  <div class="mb-3">
    <label for="jenis_barang" class="form-label">Jenis Barang</label>
    <input name="jenis_barang" type="text" class="form-control" id="jenis_barang">
  </div>
  <div class="mb-3">
    <label for="bhnbaku" class="form-label">Bahan Baku</label>
    <input name="bahan_baku" type="text" class="form-control" id="bhnbaku">
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

  @endsection