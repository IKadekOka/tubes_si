@extends('layouts.main')

@section('container')
  <div class="jumbotron text-center">
      <h1>Selamat Datang Customer</h1>
  </div>

<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="thumbnail">
                <img src="http://127.0.0.1:8000/img/lemari.jpg" width="100%" alt="Cinque Terre">
                <div>
                    <br>
                    <h3>Lemari Kayu Minimalis</h3>
                    <p>Tak perlu khawatir, karena lemari kayu ini telah 
                      dilapisi lapisan pelindung yang cukup untuk menjaga 
                      lemari Anda tetap kering dan bebas rayap.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="thumbnail">
                <img src="http://127.0.0.1:8000/img/meja-makan-minimalis.jpg" width="100%" alt="Cinque Terre"></a>
                <div><br>
                    <h3>Meja Minimalis</a> </h3>
                    <p>Saat ini, meja memiliki banyak bentuk. Ada meja yang berbentuk persegi panjang,
                      persegi, bulat, segitiga, bundar dan elips. Masing-masing bentuk meja ini memiliki 
                      ketinggian yang disesuaikan dengan kursi yang dipasangkannya</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="thumbnail">
                <img src="http://127.0.0.1:8000/img/meja-makan.jpg" width="100%" alt="Cinque Terre"></a><br>
                <div class="caption"><br>
                    <h3>Meja Makan Kayu</h3>
                    <p>Meja makan terbaik umumnya terbuat dari kayu 
                      pilihan seperti bahan kayu ek, jati, mahoni, dan kenari.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="thumbnail">
                <img src="http://127.0.0.1:8000/img/rak-meja.jpg"  width="100%" alt="Cinque Terre"></a>
                <div class="caption"><br>
                    <h3>Rak Meja</h3>
                    <p>Rak TV minimalis merupakan salah satu furnitur yang dapat menambah keindahan pada ruanganmu. 
                      Rak ini tidak hanya berfungsi sebagai tempat meletakkan TV saja namun ada banyak fungsi lain 
                      jika kamu bisa memaksimalkannya.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection