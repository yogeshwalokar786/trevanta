<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $careerSettings = [
            [
                'key' => 'careers_heading',
                'value' => 'Join a team committed to improving global health.',
                'group' => 'careers',
                'type' => 'text',
                'label' => 'Careers Page Heading',
            ],
            [
                'key' => 'careers_description',
                'value' => 'At Trevanta International our people are at the heart of innovation. We foster a culture of collaboration, growth, and scientific excellence.',
                'group' => 'careers',
                'type' => 'textarea',
                'label' => 'Careers Page Description',
            ],
            [
                'key' => 'careers_btn_text',
                'value' => 'Explore Opportunities →',
                'group' => 'careers',
                'type' => 'text',
                'label' => 'Careers Action Button Text',
            ],
            [
                'key' => 'careers_btn_url',
                'value' => '/contact',
                'group' => 'careers',
                'type' => 'text',
                'label' => 'Careers Action Button URL',
            ],
            [
                'key' => 'careers_email',
                'value' => 'info@trevanta.com',
                'group' => 'careers',
                'type' => 'email',
                'label' => 'Careers Inquiry Email',
            ],
        ];

        foreach ($careerSettings as $setting) {
            if (!DB::table('settings')->where('key', $setting['key'])->exists()) {
                DB::table('settings')->insert(array_merge($setting, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));
            }
        }

        if (class_exists(Setting::class)) {
            Setting::clearCache();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('settings')->whereIn('key', [
            'careers_heading',
            'careers_description',
            'careers_btn_text',
            'careers_btn_url',
            'careers_email',
        ])->delete();

        if (class_exists(Setting::class)) {
            Setting::clearCache();
        }
    }
};
