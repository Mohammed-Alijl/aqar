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
        Schema::create('related_aqar', function (Blueprint $table) {
            $table->foreignId('aqar_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('related_aqar_id')->constrained('aqars')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['aqar_id','related_aqar_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('related_aqar');
    }
};
