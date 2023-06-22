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
        Schema::create('score_rules', function (Blueprint $table) {
            $table->id();
            $table->integer('position');
            $table->integer('points');
            $table->unsignedBigInteger('race_type_id');
            $table->unsignedBigInteger('race_class_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('race_type_id')
                  ->constrained('race_types')
                  ->onDelete('cascade');
            $table->foreignId('race_class_id')
                  ->constrained('race_classes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score_rules');
    }
};
