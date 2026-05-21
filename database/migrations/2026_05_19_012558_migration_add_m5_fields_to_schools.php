<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * M5 — Agregar campos faltantes a la tabla schools.
     * Ejecutar: php artisan migrate
     */
    public function up(): void
    {
        Schema::table('schools', function (Blueprint $table) {

            // Información básica adicional
            $table->string('address')->nullable()->after('municipality');
            $table->smallInteger('founded_year')->unsigned()->nullable()->after('address');

            // Imagen de sede principal (complementa logo_url)
            $table->string('cover_url')->nullable()->after('logo_url');

            // Contacto y web
            $table->string('website_url')->nullable()->after('phone');

            // Estadísticas
            $table->unsignedInteger('students_count')->default(0)->after('website_url');
            $table->unsignedInteger('teachers_count')->default(0)->after('students_count');

            // Ubicación GPS
            $table->decimal('location_lat', 10, 8)->nullable()->after('teachers_count');
            $table->decimal('location_lng', 11, 8)->nullable()->after('location_lat');

            // Redes sociales {facebook, youtube, instagram}
            $table->json('social_links')->nullable()->after('location_lng');

            // Rector (FK a users — nullable, se asigna cuando exista el usuario)
            $table->foreignId('rector_id')
                  ->nullable()
                  ->after('social_links')
                  ->constrained('users')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->dropForeign(['rector_id']);
            $table->dropColumn([
                'address', 'founded_year', 'cover_url', 'website_url',
                'students_count', 'teachers_count',
                'location_lat', 'location_lng',
                'social_links', 'rector_id',
            ]);
        });
    }
};
