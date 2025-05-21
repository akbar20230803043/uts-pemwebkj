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
        Schema::create('supirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('no_sim')->nullable();
            $table->enum('jenis_sim', ['A', 'B1', 'B2', 'C'])->nullable();
            $table->date('sim_terbit')->nullable();
            $table->date('sim_expired')->nullable();
            $table->string('status')->default('Aktif');
            $table->date('tanggal_bergabung')->nullable();
            $table->string('kendaraan_dikuasai')->nullable();
            $table->integer('pengalaman')->nullable(); // dalam tahun
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supirs');
    }
};
