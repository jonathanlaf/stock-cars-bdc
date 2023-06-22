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
        Schema::create('race_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->softDeletes();
            $table->timestamps();
        });

        Artisan::call( 'db:seed', [
                '--class' => 'RaceTypeSeeder',
                '--force' => true ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_types');
    }
};
