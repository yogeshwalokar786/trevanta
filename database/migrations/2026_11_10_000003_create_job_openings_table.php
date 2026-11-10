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
        if (!Schema::hasTable('job_openings')) {
            Schema::create('job_openings', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('department')->nullable();
                $table->string('job_type')->default('Full-Time'); // Full-Time, Part-Time, Contract, Hybrid, Remote
                $table->string('location')->nullable();
                $table->string('experience')->nullable();
                $table->text('description');
                $table->longText('requirements')->nullable();
                $table->string('apply_email')->nullable();
                $table->string('apply_url')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('order')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
