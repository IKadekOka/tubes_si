@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Data Supir</h3>
      <div>
        <a class="btn btn-primary" href="{{route('Supir.create-supir')}}">Tambah</a>
        <a class="btn btn-danger" href="{{route('Supir.cetak')}}" target="_blank">Cetak</a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Id Supir</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>        
          @foreach ($supir as $supirs)
          <tr>
          <td>{{$supirs->id}}</td>
          <td>{{$supirs->nama}}</td>
          <td>{{$supirs->alamat}}</td>
          <td>{{$supirs->no_telp}}</td>
          <td>
            <a href="{{route('Supir.edit-supir',['id'=>$supirs->id])}}" class="btn btn-primary">Edit</a>
            <a href="{{route('Supir.delete',['id'=>$supirs->id])}}" class="btn btn-danger">Hapus</a>
          </td>
        </tr>            
          @endforeach
      </table>
    </div>
</div>   

@endsection