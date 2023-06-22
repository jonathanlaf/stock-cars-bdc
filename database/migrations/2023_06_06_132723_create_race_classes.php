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
        Schema::create('race_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->softDeletes();
            $table->timestamps();
        });

        Artisan::call( 'db:seed', [
                '--class' => 'RaceClassSeeder',
                '--force' => true ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_classes');
    }
};
