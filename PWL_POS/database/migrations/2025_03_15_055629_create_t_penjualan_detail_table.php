<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penjualan_id');
            $table->unsignedBigInteger('id');
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2);
            $table->timestamps();

            $table->foreign('penjualan_id')->references('id')->on('t_penjualan')->onDelete('cascade');
            $table->foreign('id')->references('id')->on('m_barang')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_penjualan_detail');
    }
};
