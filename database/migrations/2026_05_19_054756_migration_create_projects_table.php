<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * M3 — Tabla de proyectos estratégicos del PEM.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('strategic_line_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('program')->nullable();          // nombre del programa al que pertenece
            $table->text('purpose')->nullable();            // propósito del proyecto
            $table->text('key_components')->nullable();     // componentes clave (texto libre)
            $table->decimal('progress', 5, 2)->default(0); // 0.00 a 100.00 (%)
            $table->unsignedInteger('goals_count')->default(0);
            $table->unsignedInteger('goals_done_count')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        // Tabla pivote school_project
        Schema::create('school_project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->unique(['school_id', 'project_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_project');
        Schema::dropIfExists('projects');
    }
};
