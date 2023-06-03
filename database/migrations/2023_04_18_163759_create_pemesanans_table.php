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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_outlet");
            $table->unsignedBigInteger("id_barang");
            $table->integer("jumlah_pesanan");
            $table->float("total_harga",10,2);
            $table->timestamps();

            $table->foreign("id_outlet")->references("id")->on("outlets");
            $table->foreign("id_barang")->references("id")->on("barangs");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
};
