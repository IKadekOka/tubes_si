@extends('layouts.main')

@section('container')

<form action="{{route('Pengiriman.update-pengiriman',$pengiriman->id)}}" method="POST">
@csrf
  <h3>Data Pengiriman</h3>
    <div class="form-group">
      <label for="exampleFromControlTexarea1">Id Pemesanan</label>
      <select class="form-control" name="id_pemesanan" aria-label="Default select example">
        <option value="{{$pengiriman->id_pemesanan}}">{{"id_pemesanan"}}</option>
          <option selected disabled>Id Pemesanan</option>
          @foreach ( $pemesanan as $pemesanans )
              <option value="{{ $pemesanans->id }}">{{ $pemesanans->jumlah_pesanan}}</option>
          @endforeach
      </select>
      <div class="form-group">
        <label for="exampleFromControlTexarea1">Id Jadwal</label>
        <select class="form-control" name="id_jadwal" aria-label="Default select example">
            <option value="{{$pengiriman->id_jadwal}}">{{'id_jadwal'}}</option>
            <option selected disabled>Id Jadwal</option>
            @foreach ( $jadwal as $jadwals )
                <option value="{{ $jadwals->id }}">{{ $jadwals->tanggal_pengiriman}}</option>
            @endforeach
        </select>
        <div class="d-flex" >
          <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </div>
</form>

  @endsection