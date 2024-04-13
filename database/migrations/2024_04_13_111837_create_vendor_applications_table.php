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
        Schema::create('vendor_applications', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->integer('phone_number');
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('stand_type');
            $table->json('electricity_details')->nullable();
            $table->boolean('uses_gas')->default(false);
            $table->json('products');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_applications');
    }
};
