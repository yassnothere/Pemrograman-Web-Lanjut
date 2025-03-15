<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 100);
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('kategori_id');
            $table->decimal('harga', 10, 2);
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('m_supplier')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('m_kategori')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_barang');
    }
};
