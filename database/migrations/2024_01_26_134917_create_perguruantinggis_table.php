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
        Schema::create('perguruantinggis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perguruan_tinggi');
            $table->string('alamat');
            $table->string('website');
            $table->string('email');
            $table->string('akreditasi');
            $table->integer('biaya');
            $table->enum('kategori',['Politeknik','Swasta','Sekolah Tinggi','Institut','Negeri']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perguruantinggis');
    }
};
