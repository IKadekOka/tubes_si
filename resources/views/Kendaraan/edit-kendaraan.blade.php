@extends('layouts.main')

@section('container')

<form action="{{route('Kendaraan.update-kendaraan',$kendaraan->id)}}" method="POST">
  @csrf
  <h3>Data Kendaraan</h3>
  <div class="form-group">
    <label for="exampleFromControlTexarea1">Id Supir</label>
    <select class="form-control" name="id_supir" aria-label="Default select example">
        <option value="{{$kendaraan->id_supir}}">{{"id_supir"}}</option>
        <option selected disabled>Id Supir</option>
        @foreach ( $supir as $supirs )
            <option value="{{ $supirs->id }}">{{ $supirs->nama}}</option>
        @endforeach
    </select>
</div>
  <div class="mb-3">
    <label for="nopol_kendaraan" class="form-label">NoPol Kendaraan</label>
    <input name="nopol_kendaraan" type="text" class="form-control" id="nopol_kendaraan" value="{{$kendaraan->nopol_kendaraan}}">
  </div>
  <div class="mb-3">
    <label for="jenis_mobil" class="form-label">Jenis Mobil</label>
    <input name="jenis_mobil" type="text" class="form-control" id="jenis_mobil" value="{{$kendaraan->jenis_mobil}}">
  </div>
  <div>
    <label for="status_kendaraan" class="form-label">Status Kendaraan</label>
    <input name="status_kendaraan" type="text" class="form-control" id="status_kendaraan" value="{{$kendaraan->status_kendaraan}}">
  </div><br>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

  @endsection