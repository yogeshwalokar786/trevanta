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
            $seoSettings = [
                // About Us Page SEO
                ['key' => 'about_meta_title', 'value' => 'About Us | Trevanta International', 'group' => 'seo', 'type' => 'text', 'label' => 'About Us Meta Title'],
                ['key' => 'about_meta_description', 'value' => 'Trevanta International is established by a team of highly-qualified clinical research industry professionals delivering reliable, cost-effective, and technology-driven CRO solutions worldwide.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'About Us Meta Description'],
                ['key' => 'about_meta_keywords', 'value' => 'about Trevanta, clinical research team, CRO leadership, medical monitoring, regulatory experts, clinical trial workforce', 'group' => 'seo', 'type' => 'textarea', 'label' => 'About Us Focus Keywords'],
                ['key' => 'about_og_image', 'value' => 'images/doctor-consultation.jpg', 'group' => 'seo', 'type' => 'media_image', 'label' => 'About Us Social Share Image'],

                // Services Page SEO
                ['key' => 'services_meta_title', 'value' => 'Clinical Research Services & CRO Solutions | Trevanta International', 'group' => 'seo', 'type' => 'text', 'label' => 'Services Meta Title'],
                ['key' => 'services_meta_description', 'value' => 'Explore Trevanta International’s comprehensive suite of 7 CRO services: Clinical Development (Phase I–IV), Regulatory Affairs, Biometrics & Data Management, Pharmacovigilance, Medical Writing, Laboratory Services, and FSP Solutions.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Services Meta Description'],
                ['key' => 'services_meta_keywords', 'value' => 'clinical development Phase I-IV, regulatory affairs CRO, biometrics data management, pharmacovigilance drug safety, medical writing, laboratory biomarker services, FSP solutions', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Services Focus Keywords'],
                ['key' => 'services_og_image', 'value' => 'images/doctor-consultation.jpg', 'group' => 'seo', 'type' => 'media_image', 'label' => 'Services Social Share Image'],

                // Careers Page SEO
                ['key' => 'careers_meta_title', 'value' => 'Careers in Clinical Research | Trevanta International', 'group' => 'seo', 'type' => 'text', 'label' => 'Careers Meta Title'],
                ['key' => 'careers_meta_description', 'value' => 'Join a team committed to improving global health. Explore clinical research associate (CRA), biostatistician, and regulatory specialist job openings at Trevanta International.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Careers Meta Description'],
                ['key' => 'careers_meta_keywords', 'value' => 'clinical research careers, CRA jobs, biostatistics jobs, clinical operations careers, CRO hiring, clinical data manager jobs', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Careers Focus Keywords'],
                ['key' => 'careers_og_image', 'value' => 'images/doctor-consultation.jpg', 'group' => 'seo', 'type' => 'media_image', 'label' => 'Careers Social Share Image'],

                // Contact Us Page SEO
                ['key' => 'contact_meta_title', 'value' => 'Contact Us & Request Study RFP | Trevanta International', 'group' => 'seo', 'type' => 'text', 'label' => 'Contact Us Meta Title'],
                ['key' => 'contact_meta_description', 'value' => 'Get in touch with Trevanta International. Request a clinical trial proposal (RFP), study feasibility assessment, or pharmacovigilance consultation.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Contact Us Meta Description'],
                ['key' => 'contact_meta_keywords', 'value' => 'contact CRO, clinical trial RFP, study feasibility request, pharmacovigilance consultation, Trevanta Montreal contact', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Contact Us Focus Keywords'],
                ['key' => 'contact_og_image', 'value' => 'images/doctor-consultation.jpg', 'group' => 'seo', 'type' => 'media_image', 'label' => 'Contact Us Social Share Image'],
            ];

            foreach ($seoSettings as $item) {
                if (!DB::table('settings')->where('key', $item['key'])->exists()) {
                    DB::table('settings')->insert(array_merge($item, [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]));
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('settings')) {
            DB::table('settings')->whereIn('key', [
                'about_meta_title', 'about_meta_description', 'about_meta_keywords', 'about_og_image',
                'services_meta_title', 'services_meta_description', 'services_meta_keywords', 'services_og_image',
                'careers_meta_title', 'careers_meta_description', 'careers_meta_keywords', 'careers_og_image',
                'contact_meta_title', 'contact_meta_description', 'contact_meta_keywords', 'contact_og_image',
            ])->delete();
        }
    }
};

