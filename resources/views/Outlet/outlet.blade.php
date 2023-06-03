@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Data Outlet</h3>
      <div>
        <a class="btn btn-primary" href="{{route('Outlet.create-outlet')}}">Tambah</a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Id Outlet</th>
          <th>Nama Outlet</th>
          <th>No Telepon</th>
          <th>Lokasi</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($outlet as $outlets)
          <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$outlets->nama_outlet}}</td>
          <td>{{$outlets->no_telp}}</td>
          <td>{{$outlets->lokasi}}</td>
          <td>
            <a href="{{route('Outlet.edit-outlet',['id'=>$outlets->id])}}" class="btn btn-primary">Edit</a>
            <a href="{{route('Outlet.delete',['id'=>$outlets->id])}}" type="button" class="btn btn-danger">Hapus</a>
          </td>
          </tr>
          @endforeach
      </table>
    </div>
  </div>  

@endsection