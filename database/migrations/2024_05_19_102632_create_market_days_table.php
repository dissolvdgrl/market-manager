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
        Schema::create('market_days', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date')->default(now());
            $table->timestamp('start_time')->default(now());
            $table->timestamp('end_time')->default(now()->addHours(5));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_days');
    }
};
