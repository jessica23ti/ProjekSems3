<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualans', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id'); // Relasi ke tabel User
            $table->unsignedBigInteger('product_id'); // Relasi ke tabel Product
            $table->integer('jumlah_produk_terjual');
            $table->decimal('total_biaya', 10, 2);
            $table->date('tanggal_jual');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
