<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('settings')) {
            DB::table('settings')
                ->where('value', 'LIKE', '%astraclinical%')
                ->orWhere('value', 'LIKE', '%astra%')
                ->get()
                ->each(function ($row) {
                    $newVal = str_ireplace('astraclinical.com', 'trevanta.com', $row->value);
                    $newVal = str_ireplace('astraclinical', 'Trevanta International', $newVal);
                    DB::table('settings')->where('id', $row->id)->update(['value' => $newVal]);
                });

            Setting::clearCache();
        }

        if (Schema::hasTable('blogs')) {
            DB::table('blogs')
                ->where('content', 'LIKE', '%astraclinical%')
                ->orWhere('summary', 'LIKE', '%astraclinical%')
                ->orWhere('title', 'LIKE', '%astraclinical%')
                ->orWhere('meta_title', 'LIKE', '%astraclinical%')
                ->orWhere('author_name', 'LIKE', '%astraclinical%')
                ->get()
                ->each(function ($b) {
                    $updates = [];
                    foreach (['title', 'summary', 'content', 'meta_title', 'meta_description', 'meta_keywords', 'og_title', 'og_description', 'author_name'] as $field) {
                        if (isset($b->$field) && (stripos($b->$field, 'astraclinical') !== false || stripos($b->$field, 'astra') !== false)) {
                            $val = str_ireplace('astraclinical.com', 'trevanta.com', $b->$field);
                            $val = str_ireplace('astraclinical', 'Trevanta International', $val);
                            $updates[$field] = $val;
                        }
                    }
                    if (!empty($updates)) {
                        DB::table('blogs')->where('id', $b->id)->update($updates);
                    }
                });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // One-way brand name modernization
    }
};

