<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\StatusEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vendor_applications', function (Blueprint $table) {
            $table->enum("status", [
                StatusEnum::PENDING->value,
                StatusEnum::REJECTED->value,
                StatusEnum::APPROVED->value,
            ])->default(StatusEnum::PENDING->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendor_applications', function (Blueprint $table) {
            //
        });
    }
};
