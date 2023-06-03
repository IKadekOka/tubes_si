@extends('layouts.main')

@section('container')

<form action="{{route('role.store-role')}}" method="POST">
  @csrf
  <h3>Data Role</h3>
  <div>
    <label for="lokasi" class="form-label">Role</label>
    <input name="lokasi" type="text" class="form-control" id="lokasi">
  </div><br>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>

  @endsection