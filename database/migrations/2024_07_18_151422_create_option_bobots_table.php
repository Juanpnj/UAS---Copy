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
        Schema::create('option_bobots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idkrit');

            $table->unsignedBigInteger('idalt');

            $table->integer('bobot');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_bobots');
    }
};
