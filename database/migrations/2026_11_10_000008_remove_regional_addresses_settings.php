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
        if (Schema::hasTable('settings')) {
            DB::table('settings')->whereIn('key', [
                'address_india',
                'address_uae',
                'address_uk',
            ])->delete();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to restore regional addresses
    }
};

