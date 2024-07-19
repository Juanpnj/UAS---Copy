<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('preferensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ida');

            $table->unsignedBigInteger('idb');

            $table->unsignedBigInteger('idkrit');

            $table->integer('bobot');
            $table->integer('hd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferensis');
    }
};
