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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('nik')->unique();
            $table->date('ttl');
            $table->string('ibu');
            $table->string('alamat');
            $table->string('no_hp');
            $table->bigInteger('no_bpjs')->nullable();
            $table->string('gender');
            $table->string('goldar');
            $table->string('agama');
            $table->string('status');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('penjamin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
