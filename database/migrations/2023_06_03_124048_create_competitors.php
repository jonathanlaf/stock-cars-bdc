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
        Schema::create('competitors', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->unique();
            $table->string('name');
            $table->enum('class', [
               'Enduro',
               'Mini mods',
               'Sport Compact',
               '8 Cylinders',
               '4 Cylinders Open',
               'STR',
               'Women'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitors');
    }
};
