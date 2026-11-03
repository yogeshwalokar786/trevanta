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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('Clinical Strategy');
            $table->string('badge')->nullable();
            $table->text('summary')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->string('read_time')->default('5 min read');
            $table->string('author_name')->default('AstraClinical Medical Director');
            $table->string('author_title')->nullable()->default('Clinical Research Team');
            $table->string('author_avatar')->nullable()->default('AC');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
