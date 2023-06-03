@extends('layouts.main')

@section('container')

  <div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Data Barang</h3>
      <div>
          <a class="btn btn-primary" href="{{route('Barang.create-barang')}}">Tambah</a>
          <a href="{{route('Barang.cetak')}}" target="_blank" class="btn btn-danger">Cetak</a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Id Barang</th>
          <th>Id Kategori Barang</th>
          <th>Nama Barang</th>
          <th>Harga Barang</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($barang as $barangs )
          <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$barangs->id_kategori}}</td>
            <td>{{$barangs->nama_barang}}</td>
            <td>{{$barangs->harga_barang}}</td>
            <td>
              <a href="{{route('Barang.edit-barang',['id'=>$barangs->id])}}" class="btn btn-primary">Edit</a>
              <a href="{{route('Barang.delete',['id'=>$barangs->id])}}" type="button" class="btn btn-danger">Hapus</a>
            </td>
          </tr>      
          @endforeach
      </table>
    </div>
  </div>    
@endsection