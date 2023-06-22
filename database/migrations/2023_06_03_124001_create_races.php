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
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('race_type_id');
            $table->unsignedBigInteger('race_class_id');
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('races');
    }
};
