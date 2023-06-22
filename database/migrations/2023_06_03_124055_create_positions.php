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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competitor_id');
            $table->unsignedBigInteger('race_id');
            $table->integer('position');
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('competitor_id')
                  ->constrained('competitors')
                  ->onDelete('cascade');
            $table->foreignId('race_id')
                  ->constrained('races')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
