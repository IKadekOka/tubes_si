@extends('layouts.main')

@section('container')
    <form action="{{ route('Barang.update-barang',$barang->id)}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFromControlTexarea1">Id Kategori Barang</label>
            <select class="form-control" name="id_kategori" aria-label="Default select example">
                <option value="{{$barang->id_kategori}}">{{"id_kategori"}}</option>
                <option selected disabled>Id Kategori Barang</option>
                @foreach ( $kategori_barang as $kategoris )
                    <option value="{{ $kategoris->id }}">{{ $kategoris->jenis_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInput" class="form-label">Nama Barang</label>
            <input name="nama_barang" type="text" class="form-control" id="exampleInputid" value="{{$barang->nama_barang}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Harga Barang</label>
            <input name="harga_barang" type="text" class="form-control" id="exampleInput" value="{{$barang->harga_barang}}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
