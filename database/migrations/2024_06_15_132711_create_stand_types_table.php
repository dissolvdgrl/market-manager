<?php

use App\Enums\StandTypeEnum;
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
        Schema::create('stand_types', function (Blueprint $table) {
            $table->id();
            $table->enum("name", [
                StandTypeEnum::ELECTRICITY->value,
                StandTypeEnum::STANDARD->value,
            ])->default(StandTypeEnum::STANDARD->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stand_types');
    }
};
