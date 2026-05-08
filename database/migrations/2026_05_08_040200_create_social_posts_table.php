<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_posts', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->enum('platform', ['facebook', 'youtube']);
            $table->foreignId('strategic_line_id')->constrained()->onDelete('cascade');
            $table->foreignId('school_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('submitted_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('rejected_by')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('approval_reason')->nullable();
            $table->enum('rejection_reason', ['off_topic', 'low_quality', 'duplicate', 'inappropriate'])->nullable();
            $table->boolean('featured')->default(false);
            $table->string('thumbnail_url')->nullable();
            $table->longText('embed_html')->nullable();
            $table->json('oembed_data')->nullable();
            $table->timestamp('fetched_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('featured');
            $table->index('strategic_line_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_posts');
    }
};