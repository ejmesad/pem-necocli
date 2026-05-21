<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sedes', function (Blueprint $table) {
            $table->foreignId('school_id')->after('id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('codigo_dane', 20)->unique();
            $table->string('address')->nullable();
            $table->boolean('is_main')->default(false);
            $table->string('cover_url')->nullable();
            $table->decimal('location_lat', 10, 6)->nullable();
            $table->decimal('location_lng', 10, 6)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('sedes', function (Blueprint $table) {
            $table->dropColumn([
                'school_id', 'name', 'codigo_dane',
                'address', 'is_main', 'cover_url',
                'location_lat', 'location_lng',
            ]);
        });
    }
};