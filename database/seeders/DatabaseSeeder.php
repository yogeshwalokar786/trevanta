<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Inquiry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default Executive Admin Account
        User::firstOrCreate(
            ['email' => 'admin@trevanta.com'],
            [
                'name'     => 'Executive Director',
                'password' => Hash::make('Password@123'),
            ]
        );

        // Seed realistic Clinical Trial RFPs
        Inquiry::firstOrCreate(
            ['email' => 'm.vasquez@novacure.bio'],
            [
                'type'              => 'rfp',
                'name'              => 'Dr. Maria Vasquez',
                'phone'             => '+1 (617) 555-0192',
                'organization'      => 'NovaCure BioTherapeutics',
                'phase'             => 'Phase II (Proof-of-Concept)',
                'therapeutic_focus' => 'Oncology',
                'message'           => 'Multi-center Phase II solid tumor clinical protocol across North America and Europe. Target sample size 180 subjects, primary endpoint PFS and ORR. Seeking full CRO management including EDC, monitoring, and Pharmacovigilance.',
                'status'            => 'new',
            ]
        );

        Inquiry::firstOrCreate(
            ['email' => 'j.lindqvist@nordichealth.se'],
            [
                'type'              => 'rfp',
                'name'              => 'Dr. Johan Lindqvist',
                'phone'             => '+46 8 123 4567',
                'organization'      => 'Nordic Health Sciences AB',
                'phase'             => 'Phase III (Pivotal Global)',
                'therapeutic_focus' => 'Neurology',
                'message'           => 'Pivotal Phase III neurodegenerative protocol targeting 650 patients across 45 clinical sites in the UK, Poland, and Canada. Requires full CDISC data mapping, biostatistics, and regulatory dossier submission to EMA & FDA.',
                'status'            => 'in_review',
            ]
        );

        Inquiry::firstOrCreate(
            ['email' => 's.patel@genomixlabs.in'],
            [
                'type'              => 'contact',
                'name'              => 'Dr. Sanjay Patel',
                'phone'             => '+91 22 5550 4432',
                'organization'      => 'Genomix Laboratories',
                'phase'             => 'Phase I (FIH / PK-PD)',
                'therapeutic_focus' => 'Immunology',
                'message'           => 'Seeking fast feasibility assessment for a healthy volunteer PK/PD trial with escalating single doses (SAD/MAD). Need rapid IRB review and bioanalytical assay integration.',
                'status'            => 'contacted',
            ]
        );

        Inquiry::firstOrCreate(
            ['email' => 'e.dupont@biovance.fr'],
            [
                'type'              => 'rfp',
                'name'              => 'Dr. Émilie Dupont',
                'phone'             => '+33 1 42 68 55 00',
                'organization'      => 'BioVance Pharma SAS',
                'phase'             => 'Phase II (Proof-of-Concept)',
                'therapeutic_focus' => 'Rare Disease',
                'message'           => 'Orphan drug pediatric indication protocol for lysosomal storage disorder. Multi-national feasibility study involving specialized hospital clinical networks in France, Germany, and the US.',
                'status'            => 'closed',
            ]
        );
    }
}
