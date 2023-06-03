@extends('layouts.main')

@section('container')

<form action="{{route("Jadwal.store-jadwal")}}" method="POST">
  @csrf
  <h3>Data Jadwal Pengiriman</h3>
  <div class="form-group">
    <label for="exampleFromControlTexarea1">Id Kendaraan</label>
    <select class="form-control" name="id_kendaraan" aria-label="Default select example">
        <option selected disabled>Id Kendaraan</option>
        @foreach ( $kendaraan as $kendaraans )
            <option value="{{ $kendaraans->id }}">{{ $kendaraans->nopol_kendaraan }}</option>
        @endforeach
    </select>
</div>
  <div class="form-group">
    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
    <input name="tanggal_pengiriman" type="date" id="tangaal_masuk" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

  @endsection