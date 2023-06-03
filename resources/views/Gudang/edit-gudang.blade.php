@extends('layouts.main')

@section('container')

<form action="{{route('Gudang.update-gudang',$gudang->id)}}" method="POST">
  @csrf
  <h3>Data Gudang</h3>
  <div class="form-group">
    <label for="exampleFromControlTexarea1">Id Kategori Barang</label>
    <select class="form-control" name="id_barang" aria-label="Default select example">
        <option value="{{$gudang->id_barang}}">{{'id_barang'}}</option>
        <option selected disabled>Id Barang</option>
        @foreach ( $barang as $barangs)
            <option value="{{ $barangs->id }}">{{ $barangs->nama_barang }}</option>
        @endforeach
    </select>
</div>
  <div class="form-group">
    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
    <input name="tanggal_masuk" type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" value="{{$gudang->tanggal_masuk}}">
  </div>
  <div class="mb-3">
    <label for="stok_barang" class="form-label">Stok Barang</label>
    <input name="stok_barang" type="text" class="form-control" id="stok_barang" value="{{$gudang->stok_barang}}">
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

  @endsection