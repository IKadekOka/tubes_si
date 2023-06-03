@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Data Jadwal Pengiriman </h3>
      <div>
        <a class="btn btn-primary" href="{{route('Jadwal.create-jadwal')}}">Tambah</a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Id Jadwal</th>
          <th>Id Kendaraan</th>
          <th>Tanggal Pengiriman</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($jadwal as $jadwals)
          <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$jadwals->id_kendaraan}}</td>
          <td>{{$jadwals->tanggal_pengiriman}}</td>
          <td>
            <a href="{{route('Jadwal.edit-jadwal',['id'=>$jadwals->id])}}" class="btn btn-primary">Edit</a>
            <a href="{{route('Jadwal.delete',['id'=>$jadwals->id])}}" type="button" class="btn btn-danger">Hapus</a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
</div>   

@endsection