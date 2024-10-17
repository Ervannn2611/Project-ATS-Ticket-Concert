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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ID user yang memesan
            $table->foreignId('tiket_konser_id')->references('id')->on('tickets')->onDelete('cascade'); // ID tiket konser yang dipesan
            $table->integer('jumlah_tiket'); // Jumlah tiket yang dipesan
            $table->decimal('total_harga', 10, 2); // Total harga tiket
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); // Status pesanan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
