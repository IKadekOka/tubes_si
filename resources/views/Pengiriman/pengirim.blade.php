@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Data Pengirim</h3>
      <div>
        <a class="btn btn-primary" href="{{route('Pengiriman.create-pengiriman')}}">Tambah</a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Id Pengirim</th>
          <th>Id Pemesanan</th>
          <th>Id Jadwal</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($pengiriman as $pengirimans)
          <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$pengirimans->id_pemesanan}}</td>
            <td>{{$pengirimans->id_jadwal}}</td>
            <td>
              <a href="{{route('Pengiriman.edit-pengiriman',[$pengirimans->id])}}" class="btn btn-primary">Edit</a>
              <a href="{{route('Pengiriman.delete',['id'=>$pengirimans->id])}}" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          @endforeach
        </tr>
      </table>
    </div>
  </div>  

@endsection