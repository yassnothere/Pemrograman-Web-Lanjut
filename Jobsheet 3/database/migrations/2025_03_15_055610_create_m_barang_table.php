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
            $table->unsignedBigInteger('kategori_id'); // Pastikan tipe datanya sesuai
            $table->unsignedBigInteger('supplier_id');
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        
            // Sesuaikan foreign key dengan 'kategori_id'
            $table->foreign('kategori_id')->references('kategori_id')->on('m_kategori')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('m_supplier')->onDelete('cascade');
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('m_barang');
    }
};
