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
        if (!Schema::hasTable('job_applications')) {
            Schema::create('job_applications', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('job_opening_id')->nullable();
                $table->string('position_title');
                $table->string('name');
                $table->string('email');
                $table->string('phone')->nullable();
                $table->string('current_location')->nullable();
                $table->string('experience')->nullable();
                $table->string('resume_path')->nullable();
                $table->text('cover_letter')->nullable();
                $table->string('status')->default('new'); // new, reviewing, shortlisted, rejected
                $table->text('notes')->nullable();
                $table->timestamps();

                $table->foreign('job_opening_id')
                      ->references('id')
                      ->on('job_openings')
                      ->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};

