<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('blogs')) {
            DB::table('blogs')->whereIn('slug', [
                'regulatory-e6r3',
                'oncology-dct',
                'pv-signal-ai',
                'adaptive-biostat',
            ])->delete();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to restore demo blogs
    }
};
