<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('policies')) {
            Schema::create('policies', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->text('summary')->nullable();
                $table->longText('content');
                $table->string('effective_date')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('order')->default(0);
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->timestamps();
            });

            // Seed default core CRO policy pages
            DB::table('policies')->insert([
                [
                    'title' => 'Privacy Statement',
                    'slug' => 'privacy-statement',
                    'summary' => 'Comprehensive information regarding how Trevanta International collects, protects, processes, and respects clinical and website visitor personal data in compliance with GDPR, HIPAA, and PIPEDA.',
                    'content' => '<h3>1. Commitment to Data Privacy</h3>
<p>At Trevanta International, protecting the confidentiality, integrity, and privacy of personal data entrusted to us by clinical trial participants, investigators, sponsor representatives, and website visitors is paramount to our mission. This Privacy Statement details our practices governing information collection, usage, cross-border transmission, and regulatory compliance under the General Data Protection Regulation (EU GDPR / UK GDPR), the Health Insurance Portability and Accountability Act (HIPAA), and the Personal Information Protection and Electronic Documents Act (PIPEDA).</p>

<h3>2. Clinical Trial Data & De-Identification</h3>
<p>Clinical data gathered during clinical investigations managed by Trevanta International is processed strictly under pseudonymized, coded identifiers pursuant to ICH-GCP E6(R2/R3) guidelines. Direct participant personal identifiers (such as legal name, government identification numbers, and residential addresses) are never stored in central clinical databases or transferred across jurisdictions without strict key-coded pseudonymization managed exclusively by the respective investigative site.</p>

<h3>3. Data Collection Across Corporate Operations</h3>
<p>When interacting with our corporate digital platforms, we may collect:</p>
<ul>
  <li><strong>Direct Contact Inquiries:</strong> Professional contact details including your full name, institutional email address, organization/sponsor name, telephone number, and therapeutic interests submitted via inquiry forms or RFP requests.</li>
  <li><strong>Technical & Analytical Diagnostics:</strong> IP address, browser user-agent, operating system, referral URL, and aggregated telemetry necessary to maintain site security and optimize service reliability.</li>
  <li><strong>Recruitment Data:</strong> Curriculum vitae, professional certifications, licensure verification, and employment history submitted for career openings.</li>
</ul>

<h3>4. Legal Basis & Data Retention</h3>
<p>We process personal data solely based on legitimate commercial interest, performance of clinical services contracts, compliance with international regulatory recordkeeping obligations (e.g., 25-year clinical trial master file archiving mandates), or explicit consent provided by the data subject.</p>

<h3>5. Data Subject Rights & Contact</h3>
<p>You maintain the right to access, rectify, restrict processing of, or request erasure of your non-regulatory personal data. For privacy inquiries or to exercise your statutory rights, please contact our Data Protection Officer at <a href="mailto:privacy@trevanta.com">privacy@trevanta.com</a> or write to: <em>Data Protection Office, Trevanta International Inc., 4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada</em>.</p>',
                    'effective_date' => 'January 1, 2026',
                    'is_active' => 1,
                    'order' => 1,
                    'meta_title' => 'Privacy Statement & Data Protection | Trevanta International',
                    'meta_description' => 'Learn how Trevanta International protects clinical data and visitor privacy in compliance with GDPR, HIPAA, PIPEDA, and ICH-GCP international guidelines.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Terms of Use',
                    'slug' => 'terms-of-use',
                    'summary' => 'Terms and conditions governing the access, browsing, and use of Trevanta International corporate digital portals, proprietary publications, and study portals.',
                    'content' => '<h3>1. Acceptance of Terms</h3>
<p>By accessing or utilizing the website, digital portals, or scientific resources provided by Trevanta International Inc. ("Trevanta", "we", "our"), you acknowledge that you have read, understood, and agreed to be legally bound by these Terms of Use and applicable international laws.</p>

<h3>2. Scientific and Informational Disclaimers</h3>
<p>The materials, whitepapers, clinical timelines, and regulatory perspectives made available on this website are published solely for general informational, educational, and business-to-business evaluation purposes. Nothing contained herein constitutes formal medical diagnosis, clinical treatment advice, regulatory commitment, or warranty of drug approval by any health authority.</p>

<h3>3. Intellectual Property Rights</h3>
<p>All trademarks, service marks, clinical methodologies, software architectures, graphics, and written publications displayed across this website are the proprietary intellectual property of Trevanta International or its content licensors, protected by Canadian, United States, and international copyright and intellectual property conventions.</p>

<h3>4. Permitted and Restricted Use</h3>
<p>You agree not to duplicate, reverse engineer, scrape, deploy automated data-gathering robots, or inject malicious code into any component of this digital platform. Unauthorized access to restricted sponsor portals or clinical systems will be prosecuted to the maximum extent permitted by applicable civil and criminal statutes.</p>

<h3>5. Governing Law and Jurisdiction</h3>
<p>These Terms shall be interpreted, construed, and enforced in accordance with the laws of the Province of Quebec and the federal laws of Canada applicable therein, without regard to conflict of law principles.</p>',
                    'effective_date' => 'January 1, 2026',
                    'is_active' => 1,
                    'order' => 2,
                    'meta_title' => 'Terms of Use & Legal Notice | Trevanta International',
                    'meta_description' => 'Review the terms and conditions governing the access and utilization of Trevanta International corporate digital portals and research publications.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'GCP Compliance Statement',
                    'slug' => 'gcp-statement',
                    'summary' => 'Official Quality Assurance and Good Clinical Practice (ICH-GCP E6 R2/R3) compliance framework adhered to by Trevanta International clinical operations worldwide.',
                    'content' => '<h3>1. Global Quality & Regulatory Commitment</h3>
<p>Trevanta International is fully committed to maintaining the highest ethical, scientific, and quality standards across all phases of human clinical research. Our clinical operations, biostatistics, pharmacovigilance, and monitoring infrastructures strictly adhere to the International Council for Harmonisation Good Clinical Practice guidelines (ICH-GCP E6 R2 and emerging E6 R3 recommendations), the Declaration of Helsinki, US FDA Title 21 Code of Federal Regulations (21 CFR Parts 11, 50, 54, 56, and 312), EU Clinical Trials Regulation (CTR EU No 536/2014), and Health Canada Food and Drugs Act Regulations.</p>

<h3>2. Standard Operating Procedures (SOPs) & Validation</h3>
<p>All clinical trials executed by Trevanta operate under a rigorous, audited system of comprehensive Standard Operating Procedures (SOPs). Our computer systems validation (CSV) lifecycle complies rigorously with GAMP 5 principles, guaranteeing that all Electronic Data Capture (EDC), Clinical Trial Management Systems (CTMS), and eTMF repositories maintain 21 CFR Part 11 compliant immutable audit trails, electronic signatures, and tamper-evident access logs.</p>

<h3>3. Independent Quality Assurance Unit</h3>
<p>Our dedicated, independent Quality Assurance (QA) Unit operates autonomously from operational trial teams. QA auditors perform regular risk-based internal system audits, investigator site audits, vendor qualification reviews, and mock regulatory inspections to ensure audit-readiness at all milestones of every clinical study.</p>

<h3>4. Ethics Committee Oversight & Participant Safety</h3>
<p>No clinical protocol or investigational product testing is initiated without prior written authorization from applicable Institutional Review Boards (IRBs) / Independent Ethics Committees (IECs) and relevant national health authorities. Uncompromised human subject protection and verifiable data veracity represent our core institutional mandate.</p>',
                    'effective_date' => 'January 1, 2026',
                    'is_active' => 1,
                    'order' => 3,
                    'meta_title' => 'ICH-GCP Quality & Compliance Statement | Trevanta International',
                    'meta_description' => 'Read Trevanta International Good Clinical Practice (GCP) quality policy, 21 CFR Part 11 compliance framework, and clinical trial assurance standards.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Whistleblower & Ethics Notice',
                    'slug' => 'whistleblower-notice',
                    'summary' => 'Confidential and anonymous reporting procedures for ethical concerns, trial integrity issues, GCP deviations, or corporate compliance matters.',
                    'content' => '<h3>1. Institutional Policy on Ethical Integrity</h3>
<p>Trevanta International maintains a strict zero-tolerance policy against unethical conduct, research misconduct, regulatory non-compliance, financial impropriety, harassment, and retaliation. We encourage all employees, investigators, contractors, study coordinators, and sponsor partners to report any suspected breach of regulatory standards or ethical policies.</p>

<h3>2. Confidential & Anonymous Reporting Channels</h3>
<p>Suspected violations of Good Clinical Practice, protocol non-compliance, data falsification, workplace misconduct, or financial irregularities may be reported through several confidential channels:</p>
<ul>
  <li><strong>Ethics & Compliance Hotline:</strong> Available 24 hours a day, 7 days a week with multi-language operator support.</li>
  <li><strong>Direct Compliance Email:</strong> <a href="mailto:compliance@trevanta.com">compliance@trevanta.com</a></li>
  <li><strong>Postal Communication:</strong> <em>Chief Compliance Officer, Confidential Whistleblower Intake, Trevanta International, 4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada</em>.</li>
</ul>

<h3>3. Absolute Protection Against Retaliation</h3>
<p>Trevanta International strictly prohibits retaliation, adverse employment action, discrimination, or reprisal of any kind against any individual who submits a report in good faith or participates in an investigation. Any employee or manager found to have engaged in retaliatory behavior is subject to immediate termination and potential legal liability.</p>

<h3>4. Investigation Procedure & Governance</h3>
<p>Every report received is cataloged, acknowledged within two business days, and assigned to an independent investigation officer. Corrective and Preventive Action (CAPA) plans are implemented promptly when necessary, and reports are summarized periodically to the Board of Directors Audit & Compliance Committee.</p>',
                    'effective_date' => 'January 1, 2026',
                    'is_active' => 1,
                    'order' => 4,
                    'meta_title' => 'Whistleblower & Corporate Ethics Notice | Trevanta International',
                    'meta_description' => 'Review Trevanta International confidential whistleblower channels, zero-retaliation protections, and reporting mechanisms for research integrity.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};

