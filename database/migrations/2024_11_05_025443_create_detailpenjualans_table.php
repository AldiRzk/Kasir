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
        Schema::create('detailpenjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penjualan')->constrained('penjualans')->onDelete('cascade');
            $table->foreignId('id_produk')->constrained('produks')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->integer('diskon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailpenjualans');
    }
};
