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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_konser');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->decimal('harga',10,2);
            $table->integer('jumlah_tiket');
            $table->integer('tiket_terjual')->default(0);
            $table->text('deskripsi')->nullabel();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
