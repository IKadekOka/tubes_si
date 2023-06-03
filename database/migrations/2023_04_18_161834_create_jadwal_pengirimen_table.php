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
        Schema::create('jadwal_pengirimen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_kendaraan");
            $table->string("tanggal_pengiriman");
            $table->timestamps();

            $table->foreign("id_kendaraan")->references("id")->on("kendaraans");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_pengirimen');
    }
};
