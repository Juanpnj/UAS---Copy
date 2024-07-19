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
        Schema::create('index_preferensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ida');

            $table->unsignedBigInteger('idb');

            $table->double('ipref');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('index_preferensis');
    }
};
