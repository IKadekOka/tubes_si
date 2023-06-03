@extends('layouts.main')

@section('container')
    <form action="{{ route('Barang.store-barang') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFromControlTexarea1">Id Kategori Barang</label>
            <select class="form-control" name="id_kategori" aria-label="Default select example">
                <option selected disabled>Id Kategori Barang</option>
                @foreach ( $kategori_barang as $kategoris )
                    <option value="{{ $kategoris->id }}">{{ $kategoris->jenis_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInput" class="form-label">Nama Barang</label>
            <input name="nama_barang" type="text" class="form-control" id="exampleInputid">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Harga Satuan</label>
            <input name="harga_barang" type="text" class="form-control" id="exampleInput">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
