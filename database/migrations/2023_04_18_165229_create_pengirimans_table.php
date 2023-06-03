<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_pemesanan");
            $table->unsignedBigInteger("id_jadwal");
            $table->timestamps();

            $table->foreign("id_pemesanan")->references("id")->on("pemesanans");
            $table->foreign("id_jadwal")->references("id")->on("jadwal_pengirimen");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengirimans');
    }
};
