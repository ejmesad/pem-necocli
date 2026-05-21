<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('codigo_dane', 20)->unique();
            $table->string('address')->nullable();
            $table->boolean('is_main')->default(false);
            $table->string('cover_url')->nullable();
            $table->decimal('location_lat', 10, 6)->nullable();
            $table->decimal('location_lng', 10, 6)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sedes');
    }
};