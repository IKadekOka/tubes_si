@extends('layouts.main')

@section('container')
<form action="{{route('Pemesanan.update-pemesanan',$pemesanan->id)}}" method="POST">
        @csrf
        <h3>Data Pemesanan</h3>
        <div class="form-group">
          <label for="exampleFromControlTexarea1">Id Outlet</label>
          <select class="form-control" name="id_outlet" aria-label="Default select example">
            <option value="{{$pemesanan->id_outlet}}">{{"id_outlet"}}</option>
              <option selected disabled>Id Outlet</option>
              @foreach ($outlet as $outlets)
              <option value="{{$outlets->id}}">{{$outlets->nama_outlet}}</option>                
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFromControlTexarea1">Id Barang</label>
          <select class="form-control" name="id_barang" aria-label="Default select example">
            <option value="{{$pemesanan->id_barang}}">{{"id_barang"}}</option>
              <option selected disabled>Id Barang</option>
              @foreach ($barang as $barangs)
              <option value="{{$barangs->id}}">{{$barangs->nama_barang}}</option>                
              @endforeach
          </select>
        </div>
        <div class="mb-3">
            <label for="jumlah_pesanan" class="form-label">Jumlah Pemesanan</label>
            <input name="jumlah_pesanan" type="text" class="form-control" id="jumlah_pesanan" value="{{$pemesanan->jumlah_pesanan}}">
        </div>
        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input name="total_harga" type="text" class="form-control" id="total_harga" value="{{$pemesanan->total_harga}}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
