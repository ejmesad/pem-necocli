<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('meta')->nullable();        // ej: "15 mar 2026 · Acta disponible"
            $table->string('icon')->default('📰');     // emoji
            $table->string('link')->nullable();        // URL opcional
            $table->boolean('active')->default(true);
            $table->integer('order')->default(0);     // para ordenar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
