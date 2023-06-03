@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Data Kategori Barang</h3>
      <div>
          <a class="btn btn-primary" href="{{route('kategori.create-kategori')}}">Tambah</a>
          <a href="{{route('kategori.cetak')}} " class="btn btn-danger " target="_blank">Cetak</a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Id Kategori Barang</th>
          <th>Jenis Barang</th>
          <th>Bahan Baku</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
      @foreach($kategori as $kategoris)
        <tr>
        <td>{{ $loop->index+1}}</td>
        <td>{{ $kategoris->jenis_barang }}</td>
        <td>{{ $kategoris->bahan_baku}}</td>
        <td>
          <a href="{{route('Kategori.edit-kategori',['id'=>$kategoris->id])}}" class="btn btn-primary" >Edit</a>
          <a href="{{route('Kategori.delete',['id'=>$kategoris->id])}}" type="button" class="btn btn-danger">Hapus</a>
        </td>
        @endforeach
      </table>
    </div>
</div>   

@endsection