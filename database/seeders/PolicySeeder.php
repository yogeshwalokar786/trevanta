<?php

namespace Database\Seeders;

use App\Models\Policy;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds for essential CRO policy documents.
     */
    public function run(): void
    {
        $policies = [
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
                'is_active' => true,
                'order' => 1,
                'meta_title' => 'Privacy Statement & Data Protection | Trevanta International',
                'meta_description' => 'Learn how Trevanta International protects clinical data and visitor privacy in compliance with GDPR, HIPAA, PIPEDA, and ICH-GCP international guidelines.',
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
                'is_active' => true,
                'order' => 2,
                'meta_title' => 'Terms of Use & Legal Notice | Trevanta International',
                'meta_description' => 'Review the terms and conditions governing the access and utilization of Trevanta International corporate digital portals and research publications.',
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
                'is_active' => true,
                'order' => 3,
                'meta_title' => 'ICH-GCP Quality & Compliance Statement | Trevanta International',
                'meta_description' => 'Read Trevanta International Good Clinical Practice (GCP) quality policy, 21 CFR Part 11 compliance framework, and clinical trial assurance standards.',
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
                'is_active' => true,
                'order' => 4,
                'meta_title' => 'Whistleblower & Corporate Ethics Notice | Trevanta International',
                'meta_description' => 'Review Trevanta International confidential whistleblower channels, zero-retaliation protections, and reporting mechanisms for research integrity.',
            ],
            [
                'title' => 'Cookie & Tracking Technologies Policy',
                'slug' => 'cookie-policy',
                'summary' => 'Details the technical, functional, and performance cookies utilized on Trevanta International digital platforms in adherence with EU ePrivacy directives and GDPR.',
                'content' => '<h3>1. Scope & Purpose of Cookies</h3>
<p>This Cookie Policy explains how Trevanta International Inc. uses cookies, web beacons, and related browser storage technologies when you visit our corporate website and sponsor evaluation portals. We deploy these technologies to provide fundamental site navigation, analyze aggregate telemetry, and maintain system security.</p>

<h3>2. Categories of Cookies Deployed</h3>
<ul>
  <li><strong>Strictly Necessary Cookies:</strong> Essential for standard website operation, authentication sessions, CSRF token validation, and load-balancer routing. These cannot be disabled in our systems.</li>
  <li><strong>Functional Preferences:</strong> Remember your selected regional preferences, language settings, and consent state.</li>
  <li><strong>Performance & Analytics Cookies:</strong> Collect anonymous, aggregated diagnostic telemetry regarding page response latency, error codes, and navigational patterns to improve service quality.</li>
</ul>

<h3>3. No Behavioral Advertising or Third-Party Data Selling</h3>
<p>Trevanta International is a specialized B2B Clinical Research Organization. We strictly do not sell, rent, or lease personal visitor information or browser logs to commercial data brokers, advertising networks, or third-party behavioral targeting platforms.</p>

<h3>4. User Cookie Controls & Management</h3>
<p>You can adjust your cookie settings at any time through your browser configuration. Most web browsers allow you to block or delete cookies via their security options. Please note that disabling essential cookies may impact your browsing experience on our website.</p>',
                'effective_date' => 'January 1, 2026',
                'is_active' => true,
                'order' => 5,
                'meta_title' => 'Cookie & Tracking Technologies Policy | Trevanta International',
                'meta_description' => 'Understand how Trevanta International uses cookies and tracking technologies under GDPR and EU ePrivacy standards.',
            ],
            [
                'title' => '21 CFR Part 11 Electronic Records Policy',
                'slug' => 'electronic-records-policy',
                'summary' => 'Trevanta International comprehensive data integrity governance, computer system validation (CSV per GAMP 5), and ALCOA+ standards for clinical trial electronic records.',
                'content' => '<h3>1. Regulatory Authority & Scope</h3>
<p>Trevanta International operations strictly adhere to US FDA Title 21 Code of Federal Regulations Part 11 (21 CFR Part 11), EU Annex 11, and MHRA Data Integrity guidelines across all electronic data capture (EDC), clinical trial management systems (CTMS), trial master file (eTMF) repositories, and interactive response technologies (IRT).</p>

<h3>2. ALCOA+ Principles of Data Integrity</h3>
<p>All clinical records and trial master files managed across our global hubs must rigorously demonstrate the ALCOA+ framework:</p>
<ul>
  <li><strong>Attributable:</strong> Every transaction, data point, and signature is traceable to the exact individual author with date/time stamps.</li>
  <li><strong>Legible:</strong> Records remain human-readable throughout the required retention window (minimum 25 years).</li>
  <li><strong>Contemporaneous:</strong> Data is recorded in the clinical system at the exact moment the procedure or observation occurs.</li>
  <li><strong>Original:</strong> Primary source data or certified true copies are preserved without alteration.</li>
  <li><strong>Accurate:</strong> Truthful, verified against medical monitors and audit trails.</li>
  <li><strong>Plus:</strong> Complete, Consistent, Enduring, and Readily Available for inspection.</li>
</ul>

<h3>3. Computer System Validation (CSV) & Audit Trails</h3>
<p>All software platforms utilized in trial execution undergo formalized Computer System Validation (CSV) in strict accordance with GAMP 5 risk-based principles. Automated, computer-generated, time-stamped audit trails capture every record creation, amendment, and deletion without permitting overwrite or manual bypass.</p>

<h3>4. Electronic Signatures Equivalence</h3>
<p>Electronic signatures executed within Trevanta systems are legally binding and considered equivalent to full handwritten ink signatures under 21 CFR Part 11 and eIDAS regulations.</p>',
                'effective_date' => 'January 1, 2026',
                'is_active' => true,
                'order' => 6,
                'meta_title' => '21 CFR Part 11 & Data Integrity Policy | Trevanta International',
                'meta_description' => 'Review Trevanta International FDA 21 CFR Part 11 validation, ALCOA+ data integrity, and electronic signature compliance framework.',
            ],
            [
                'title' => 'Anti-Bribery & FCPA Compliance Policy',
                'slug' => 'anti-bribery-policy',
                'summary' => 'Strict corporate compliance framework prohibiting commercial bribery, public official facilitation payments, and improper investigator inducements under the FCPA and UK Bribery Act.',
                'content' => '<h3>1. Zero-Tolerance Anti-Corruption Mandate</h3>
<p>Trevanta International maintains an absolute zero-tolerance standard regarding bribery, graft, kickbacks, and improper inducements in all corporate and clinical trial activities worldwide. We operate in strict compliance with the US Foreign Corrupt Practices Act (FCPA), the UK Bribery Act 2010, the Canadian Corruption of Foreign Public Officials Act (CFPOA), and all applicable national anti-corruption legislation.</p>

<h3>2. Clinical Investigator Compensation & Fair Market Value (FMV)</h3>
<p>Contractual compensation provided to clinical investigators, research hospitals, study coordinators, and patient recruitment specialists is calculated strictly on documented Fair Market Value (FMV) methodologies reflecting verifiable clinical effort, physician hours, protocol complexity, and administrative costs. Remuneration is never conditioned upon recruitment speed, favorable trial outcomes, or sponsor commercial success.</p>

<h3>3. Prohibition of Facilitation Payments & Gifts</h3>
<p>Employees, contractors, and regional clinical research associates (CRAs) are strictly prohibited from offering, promising, giving, or accepting gifts, hospitality, lavish entertainment, or facilitation payments to regulatory officials, ethics committee members, or healthcare providers.</p>

<h3>4. Due Diligence & Vendor Oversight</h3>
<p>All third-party investigative sites, central bioanalytical laboratories, and local depot couriers must undergo formalized anti-bribery risk assessments and background verifications prior to contract execution.</p>',
                'effective_date' => 'January 1, 2026',
                'is_active' => true,
                'order' => 7,
                'meta_title' => 'Anti-Bribery, Anti-Corruption & FCPA Policy | Trevanta International',
                'meta_description' => 'Read Trevanta International Anti-Bribery Policy and compliance with FCPA, UK Bribery Act, and Fair Market Value investigator contracting.',
            ],
            [
                'title' => 'Pharmacovigilance & Safety Reporting Policy',
                'slug' => 'pharmacovigilance-safety-policy',
                'summary' => 'Global standard operating framework for expedited safety reporting, SAE/SUSAR processing, MedDRA coding, and continuous drug safety surveillance.',
                'content' => '<h3>1. Clinical Safety & Vigilance Mission</h3>
<p>Trevanta International operates an audited, centralized Pharmacovigilance & Drug Safety Unit responsible for comprehensive adverse event monitoring, aggregate risk management, and regulatory safety transmissions across clinical trial phases I through IV.</p>

<h3>2. Expedited Safety Reporting Clocks</h3>
<p>In accordance with ICH-E2A guidelines and global health authority mandates (US FDA, EMA EudraVigilance, Health Canada, UK MHRA), our safety desk adheres to strict statutory submission clocks:</p>
<ul>
  <li><strong>Fatal or Life-Threatening SUSARs:</strong> Evaluated, medically reviewed, and transmitted to competent authorities and ethics boards within <strong>7 calendar days</strong> of initial sponsor notification, with follow-up reports within an additional 8 days.</li>
  <li><strong>All Other Serious Adverse Reactions:</strong> Processed and formally submitted within <strong>15 calendar days</strong>.</li>
</ul>

<h3>3. Standardized Medical Coding</h3>
<p>Adverse event terminology, medical histories, and concomitant medications are coded by certified pharmacovigilance specialists using current Medical Dictionary for Regulatory Activities (MedDRA) and WHO Drug Global dictionaries.</p>

<h3>4. 24/7 Dedicated Safety Emergency Intake</h3>
<p>Trial investigators and medical monitors have continuous access to our 24/7 Safety Reporting Desk via dedicated hotline: <strong>+1 (800) 577-7233</strong> and encrypted safety mailbox: <strong>safety@trevanta.com</strong>.</p>',
                'effective_date' => 'January 1, 2026',
                'is_active' => true,
                'order' => 8,
                'meta_title' => 'Pharmacovigilance & Safety Reporting Policy | Trevanta International',
                'meta_description' => 'Review Trevanta International pharmacovigilance procedures, SUSAR/SAE expedited reporting clocks, and 24/7 drug safety reporting framework.',
            ],
            [
                'title' => 'Clinical Trial Diversity & Inclusion Policy',
                'slug' => 'diversity-in-trials-policy',
                'summary' => 'Action framework ensuring representative patient enrollment across underrepresented demographics, ethnicities, gender, and age spectrums pursuant to FDA diversity guidance.',
                'content' => '<h3>1. Commitment to Representative Evidence</h3>
<p>At Trevanta International, we believe clinical trial evidence must reflect the diverse real-world patient populations who will ultimately utilize approved therapeutics. In alignment with the US FDA Diversity Action Plan guidance and international health equity initiatives, we embed demographic equity into protocol design and site selection from inception.</p>

<h3>2. Site Selection & Decentralized Trial Modalities</h3>
<p>To overcome traditional enrollment barriers, our feasibility directors actively contract clinical sites situated in socioeconomically, ethnically, and geographically diverse communities. We deploy decentralized trial (DCT) options, including remote electronic consents (eConsent), home nursing visits, and localized biomarker specimen collection to minimize participant travel burdens.</p>

<h3>3. Culturally Sensitive Informed Consent</h3>
<p>All Informed Consent Forms (ICFs) and participant education materials are crafted in clear, accessible plain language and professionally translated into native regional languages with verified back-translations approved by relevant Institutional Review Boards.</p>

<h3>4. Real-Time Diversity Metric Tracking</h3>
<p>Our Clinical Trial Management System monitors demographic enrollment trajectories in real time, allowing proactive enrollment rebalancing whenever demographic disparities emerge.</p>',
                'effective_date' => 'January 1, 2026',
                'is_active' => true,
                'order' => 9,
                'meta_title' => 'Clinical Trial Diversity & Inclusion Policy | Trevanta International',
                'meta_description' => 'Explore Trevanta International strategies for equitable, representative participant enrollment in clinical trials under FDA diversity guidance.',
            ],
            [
                'title' => 'Information Security & Cyber Resilience Policy',
                'slug' => 'information-security-policy',
                'summary' => 'High-assurance cybersecurity controls, cryptographic protocols, SOC 2 / ISO 27001 posture, and incident escalation safeguarding proprietary sponsor data.',
                'content' => '<h3>1. Information Security Governance</h3>
<p>Trevanta International implements a defense-in-depth cybersecurity framework designed to safeguard sensitive trial protocols, intellectual property, and clinical health data. Our systems and processes align with ISO/IEC 27001, SOC 2 Type II criteria, and NIST cybersecurity frameworks.</p>

<h3>2. Cryptographic Standards</h3>
<p>All clinical databases, electronic Trial Master Files (eTMF), and communications are secured using state-of-the-art encryption algorithms:</p>
<ul>
  <li><strong>Data in Transit:</strong> Transport Layer Security (TLS 1.3) with perfect forward secrecy.</li>
  <li><strong>Data at Rest:</strong> Advanced Encryption Standard (AES-256) across all storage volumes, database tables, and offsite automated backups.</li>
</ul>

<h3>3. Identity & Access Governance</h3>
<p>Access to sponsor data environments is restricted strictly by the principle of least privilege (PoLP) and Role-Based Access Control (RBAC). Multi-Factor Authentication (MFA) is strictly mandatory for all administrative and operational accounts.</p>

<h3>4. Incident Response & 72-Hour Notification</h3>
<p>Trevanta maintains an audited Incident Response Team with 24/7 automated security information and event management (SIEM) monitoring. In the event of a confirmed data security incident, notifications to affected sponsors and supervisory authorities occur within 72 hours in full accordance with GDPR and applicable state regulations.</p>',
                'effective_date' => 'January 1, 2026',
                'is_active' => true,
                'order' => 10,
                'meta_title' => 'Information Security & Cyber Resilience Policy | Trevanta International',
                'meta_description' => 'Review Trevanta International cybersecurity controls, AES-256 cryptographic standards, SOC 2 / ISO 27001 posture, and incident response procedures.',
            ],
        ];

        foreach ($policies as $data) {
            Policy::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
