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
        Schema::create('attribute_aqar', function (Blueprint $table) {
            $table->foreignId('aqar_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('attribute_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['aqar_id','attribute_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_aqar');
    }
};
