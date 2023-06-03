@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Data Pemesanan</h3>
      <div>
        <a class="btn btn-primary" href="{{route('Pemesanan.create-pemesanan')}}">Tambah</a>
        <a href="{{route('Pemesanan.cetak')}}" target="_blank" class="btn btn-danger">Cetak</a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Id Pemesanan</th>
          <th>Id Outlet</th>
          <th>Id Barang</th>
          <th>Jumlah Pesanan</th>
          <th>Total Harga</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($pemesanan as $pemesanans)
          <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$pemesanans->id_outlet}}</td>
          <td>{{$pemesanans->id_barang}}</td>
          <td>{{$pemesanans->jumlah_pesanan}}</td>
          <td>{{$pemesanans->total_harga}}</td>
          <td>
            <a href="{{route('Pemesanan.edit-pemesanan',[$pemesanans->id])}}" class="btn btn-primary">Edit</a>
            <a href="{{route('Pemesanan.delete',['id'=>$pemesanans->id])}}" type="button" class="btn btn-danger">Hapus</a>
          </td>
        </tr>  
          @endforeach
      </table>
    </div>
  </div>  

@endsection