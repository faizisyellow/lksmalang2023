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
            $table->string('nama perguruan tinggi');
            $table->string('alamat');
            $table->string('website');
            $table->string('email');
            $table->string('akreditasi');
            $table->integer('biaya');
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
