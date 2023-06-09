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
        Schema::create('gudangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_barang");
            $table->dateTime("tanggal_masuk");
            $table->integer("stok_barang");
            $table->timestamps();

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
        Schema::dropIfExists('gudangs');
    }
};
