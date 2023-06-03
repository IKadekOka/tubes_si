@extends('layouts.main')

@section('container')

<div class="card">
    <div class="card-header border-0">
      <h3 class="card-title">Data Role</h3>
      <div>
        <a class="btn btn-primary" href="">Tambah</a>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-valign-middle">
        <thead>
        <tr>
          <th>Id</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($data as $roles)
          <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$roles->role}}</td>
          <td>
            <a href="{{route('Outlet.edit-outlet',['id'=>$roles->id])}}" class="btn btn-primary">Edit</a>
            <a href="{{route('Outlet.delete',['id'=>$roles->id])}}" type="button" class="btn btn-danger">Hapus</a>
          </td>
          </tr>
          @endforeach
      </table>
    </div>
  </div>  

@endsection