@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Data Gudang</h3>
      <div>
        <a class="btn btn-primary" href="{{route('Gudang.create-gudang')}}">Tambah</a>
        <a class="btn btn-danger" href="{{route('Gudang.cetak')}}" target="_blank">Cetak</a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Id Gudang</th>
          <th>Id Barang</th>
          <th>Tanggal Masuk</th>
          <th>Stok Barang</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($gudang as $gudangs)
          <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$gudangs->id_barang}}</td>
          <td>{{$gudangs->tanggal_masuk}}</td>
          <td>{{$gudangs->stok_barang}}</td>
            <td>
              <a href="{{route('Gudang.edit-gudang',[$gudangs->id])}}" class="btn btn-primary">Edit</a>
              <a href="{{route('Gudang.delete',['id'=>$gudangs->id])}}" type="button" class="btn btn-danger">Hapus</a>
          </td>
          </tr>
          @endforeach
      </table>
    </div>
  </div>  

@endsection