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
        Schema::create('aqars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->string('title');
            $table->text('description')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('watches')->default(0);
            $table->double('price')->default(0);
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aqars');
    }
};
