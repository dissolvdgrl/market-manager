`<?php

use App\Enums\RoleEnum;
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
        Schema::create('roles', static function (Blueprint $table) {
            $table->id();
            $table->enum("name", [
                RoleEnum::SUPER_ADMIN->value,
                RoleEnum::ADMIN->value,
                RoleEnum::PRE_APPROVED->value,
                RoleEnum::APPROVED->value,
                RoleEnum::EARLY_ACCESS->value
            ])->default(RoleEnum::PRE_APPROVED->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
