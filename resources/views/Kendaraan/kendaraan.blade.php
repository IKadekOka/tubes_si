@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Data Kendaraan </h3>
      <div>
        <a class="btn btn-primary" href="{{route('Kendaraan.create-kendaraan')}}">Tambah</a>
        <a href="{{route('Kendaraan.cetak')}}" target="_blank" class="btn btn-danger">Cetak</a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Id Kendaraan</th>
          <td>Id Supir</td>
          <th>NoPol Kendaraan</th>
          <th>Jenis Mobil</th>
          <th>Status Kendaraan</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($kendaraan as $kendaraans )
          <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$kendaraans->id_supir}}</td>
          <td>{{$kendaraans->nopol_kendaraan}}</td>
          <td>{{$kendaraans->jenis_mobil}}</td>
          <td>{{$kendaraans->status_kendaraan}}</td>
          <td>
            <a href="{{route('Kendaraan.edit-kendaraan',['id'=>$kendaraans->id])}}" class="btn btn-primary">Edit</a>
            <a href="{{route('Kendaraan.delete',['id'=>$kendaraans->id])}}" type="button" class="btn btn-danger">Hapus</a>
          </td>
          @endforeach
        </table>
    </div>
  </div>  

@endsection