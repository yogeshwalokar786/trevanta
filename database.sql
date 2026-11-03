-- ========================================================
-- AstraClinical Research / Trevanta Database Dump
-- Compatible with MySQL 5.7+, MySQL 8.0+, MariaDB 10.3+
-- Generated for phpMyAdmin / Direct SQL Import
-- ========================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- --------------------------------------------------------
-- Table structure for `migrations`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping data for table `migrations`
-- --------------------------------------------------------
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_11_03_000001_create_inquiries_table', 1),
(5, '2026_11_03_000002_create_blogs_table', 1),
(6, '2026_11_03_000003_create_categories_table', 1),
(7, '2026_11_03_000004_create_media_table', 1),
(8, '2026_11_03_000005_add_seo_fields_to_blogs_table', 1);

-- --------------------------------------------------------
-- Table structure for `users`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping data for table `users`
-- Admin Login: admin@trevanta.com / Password@123
-- --------------------------------------------------------
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Executive Director', 'admin@trevanta.com', NOW(), '$2y$10$rtFsvHHuVJQa8lb9FLLR9ep8wVxPgvw0mz5hOm7diOuVjeeuhLVIW', NULL, NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for `password_reset_tokens`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `sessions`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `cache`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `cache_locks`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `jobs`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `job_batches`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `failed_jobs`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `inquiries`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE `inquiries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT 'rfp',
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `organization` varchar(191) DEFAULT NULL,
  `phase` varchar(100) DEFAULT NULL,
  `therapeutic_focus` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping data for table `inquiries`
-- --------------------------------------------------------
INSERT INTO `inquiries` (`id`, `type`, `name`, `email`, `phone`, `organization`, `phase`, `therapeutic_focus`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'rfp', 'Dr. Maria Vasquez', 'm.vasquez@novacure.bio', '+1 (617) 555-0192', 'NovaCure BioTherapeutics', 'Phase II (Proof-of-Concept)', 'Oncology', 'Multi-center Phase II solid tumor clinical protocol across North America and Europe. Target sample size 180 subjects, primary endpoint PFS and ORR. Seeking full CRO management including EDC, monitoring, and Pharmacovigilance.', 'new', NOW(), NOW()),
(2, 'rfp', 'Dr. Johan Lindqvist', 'j.lindqvist@nordichealth.se', '+46 8 123 4567', 'Nordic Health Sciences AB', 'Phase III (Pivotal Global)', 'Neurology', 'Pivotal Phase III neurodegenerative protocol targeting 650 patients across 45 clinical sites in the UK, Poland, and Canada. Requires full CDISC data mapping, biostatistics, and regulatory dossier submission to EMA & FDA.', 'in_review', NOW(), NOW()),
(3, 'contact', 'Dr. Sanjay Patel', 's.patel@genomixlabs.in', '+91 22 5550 4432', 'Genomix Laboratories', 'Phase I (FIH / PK-PD)', 'Immunology', 'Seeking fast feasibility assessment for a healthy volunteer PK/PD trial with escalating single doses (SAD/MAD). Need rapid IRB review and bioanalytical assay integration.', 'contacted', NOW(), NOW()),
(4, 'rfp', 'Dr. Émilie Dupont', 'e.dupont@biovance.fr', '+33 1 42 68 55 00', 'BioVance Pharma SAS', 'Phase II (Proof-of-Concept)', 'Rare Disease', 'Orphan drug pediatric indication protocol for lysosomal storage disorder. Multi-national feasibility study involving specialized hospital clinical networks in France, Germany, and the US.', 'closed', NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for `categories`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping data for table `categories`
-- --------------------------------------------------------
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Clinical Strategy', 'clinical-strategy', 'Protocol architecture, adaptive designs, trial endpoints, and patient-centric operations.', NOW(), NOW()),
(2, 'Regulatory Affairs', 'regulatory-affairs', 'Global CTA/IND dossiers, ICH guidelines, FDA/EMA compliance, and expedited designations.', NOW(), NOW()),
(3, 'Pharmacovigilance', 'pharmacovigilance', 'Safety signal detection, ICSR intake, PSUR/PBRER reports, and real-time safety surveillance.', NOW(), NOW()),
(4, 'Biostatistics', 'biostatistics', 'CDISC SDTM/ADaM datasets, statistical analysis plans (SAP), Bayesian models, and interim stops.', NOW(), NOW()),
(5, 'Decentralized Trials', 'decentralized-trials', 'Remote patient monitoring, eConsent, home nursing, and direct-to-patient drug logistics.', NOW(), NOW()),
(6, 'Medical Devices', 'medical-devices', 'EU MDR 2017/745, ISO 14155, FDA 510(k), and Post-Market Clinical Follow-up (PMCF) registries.', NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for `blogs`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `category` varchar(100) NOT NULL DEFAULT 'Clinical Strategy',
  `badge` varchar(100) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `read_time` varchar(50) NOT NULL DEFAULT '5 min read',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `canonical_url` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `meta_robots` varchar(50) NOT NULL DEFAULT 'index, follow',
  `schema_type` varchar(50) NOT NULL DEFAULT 'BlogPosting',
  `author_name` varchar(150) NOT NULL DEFAULT 'AstraClinical Medical Director',
  `author_title` varchar(200) DEFAULT 'Clinical Research Team',
  `author_avatar` varchar(50) DEFAULT 'AC',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`),
  KEY `blogs_category_id_index` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping data for table `blogs`
-- --------------------------------------------------------
INSERT INTO `blogs` (`id`, `title`, `slug`, `category_id`, `category`, `badge`, `summary`, `content`, `image`, `read_time`, `meta_title`, `meta_description`, `meta_keywords`, `canonical_url`, `og_title`, `og_description`, `og_image`, `meta_robots`, `schema_type`, `author_name`, `author_title`, `author_avatar`, `is_featured`, `is_published`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Navigating ICH E6(R3) Modernization: Risk-Based Quality Management in Global Submissions', 'regulatory-e6r3', 2, 'Regulatory Affairs', 'FEATURED WHITEPAPER', 'A critical analysis of the finalized ICH E6(R3) guidelines and practical guidance on implementing governance frameworks that satisfy both FDA and EMA inspectors.', '<p>The transition to ICH E6(R3) represents the most comprehensive modernization of Good Clinical Practice (GCP) principles in a decade. With its core emphasis on \"fit-for-purpose\" trial designs, decentralized trial components, and computerized system validation, sponsors must rethink legacy operational SOPs.</p><p>AstraClinical\'s regulatory affairs task force has reviewed over 40 global clinical trial applications (CTAs) under the updated framework, establishing standardized Risk-Based Quality Management (RBQM) playbooks that harmonize expectations across both the FDA and the European Medicines Agency (EMA).</p><div class=\"article-takeaway-box\"><h4>ICH E6(R3) Strategic Checkpoints</h4><ul><li><strong>Critical to Quality (CtQ) Factors:</strong> Identify essential protocol variables that directly impact human subject protection and reliable data interpretation.</li><li><strong>Computerized System Validation:</strong> Ensure decentralized apps, wearable sensors, and electronic consent (eConsent) systems maintain unbroken audit trails.</li><li><strong>Proportionate Monitoring:</strong> Shift routine 100% Source Data Verification (SDV) to centralized statistical data monitoring to spot outliers early.</li></ul></div><p>Adopting this proactive regulatory posture safeguards investigational new drug (IND) dossiers from clinical holds and accelerates market authorization timelines.</p>', NULL, '7 min read', 'ICH E6(R3) Modernization & Risk-Based Quality Management | AstraClinical', 'Practical guide to implementing ICH E6(R3) governance frameworks and RBQM playbooks compliant with FDA and EMA clinical standards.', 'ICH E6(R3), GCP modernization, RBQM, FDA compliance, clinical trial applications', NULL, NULL, NULL, NULL, 'index, follow', 'BlogPosting', 'Michael Chen, MS, RAC', 'Senior Director Regulatory & Quality', 'MC', 1, 1, '2026-09-08 10:00:00', NOW(), NOW()),

(2, 'Accelerating Oncology Trials Through Decentralized Architecture & Home Nursing', 'oncology-dct', 1, 'Clinical Strategy', 'Clinical Strategy', 'How combining centralized site monitoring with localized home nursing and mobile health technologies increased patient retention by 34% in complex oncology protocols.', '<p>Traditional oncology clinical trials have historically suffered from high screening failure rates and acute patient retention challenges. In Phase II and III solid tumor trials, the burden of bi-weekly hospital visits for pharmacokinetic (PK) blood draws and toxicity monitoring frequently leads to protocol non-adherence.</p><p>At AstraClinical Research, our decentralized clinical trial (DCT) framework merges traditional brick-and-mortar investigator oversight with vetted regional home nursing networks across North America, Europe, and Asia-Pacific.</p><div class=\"article-takeaway-box\"><h4>Key Study Findings & Outcomes</h4><ul><li><strong>34% Increase in Patient Retention:</strong> Reducing travel burdens allowed fragile cancer patients to complete long-term biomarker assessment periods.</li><li><strong>42% Faster Recruitment:</strong> Broadening the geographic radius around central academic trial centers unlocked previously unreachable suburban and rural patient cohorts.</li><li><strong>100% GCP Audit Compliance:</strong> Validated ePRO and temperature-monitored investigational product (IP) direct-to-patient shipment preserved data integrity under 21 CFR Part 11.</li></ul></div><p>By leveraging connected mobile health devices and synchronized electronic source data (eSource), principal investigators retain real-time visibility into patient adverse events while dramatically expediting safety committee decision points.</p>', NULL, '6 min read', 'Accelerating Oncology Trials with Decentralized Architecture | AstraClinical', 'How decentralized trial models and regional home nursing improved oncology patient retention by 34% in Phase II and III trials.', 'oncology trials, decentralized clinical trials, DCT, home nursing, patient retention, ePRO', NULL, NULL, NULL, NULL, 'index, follow', 'BlogPosting', 'Dr. Sarah Jenkins, MD', 'VP Clinical Operations', 'SJ', 0, 1, '2026-09-15 10:00:00', NOW(), NOW()),

(3, 'Machine Learning Signal Detection in High-Volume Post-Marketing Pharmacovigilance', 'pv-signal-ai', 3, 'Pharmacovigilance', 'Pharmacovigilance', 'How AstraClinical implemented automated natural language processing (NLP) to reduce ICSR intake triage time by 62% while elevating adverse event detection accuracy.', '<p>Pharmacovigilance departments worldwide face exponential increases in individual case safety reports (ICSRs) driven by social listening, literature searches, and spontaneous reporting portals. Meeting stringent 7-day and 15-day regulatory submission deadlines requires robust, validated intelligence tools.</p><p>AstraClinical\'s pharmacovigilance safety hub processes over 120,000 safety events annually. By integrating validated machine learning classifiers into our safety database ingestion pipeline, our medical monitors focus their expertise where clinical judgment matters most.</p><div class=\"article-takeaway-box\"><h4>Operational Benchmarks Achieved</h4><ul><li><strong>62% Reduction in Triage Latency:</strong> MedDRA coding recommendations and duplicate screening execute automatically in under 4 seconds per narrative.</li><li><strong>99.8% Regulatory On-Time Submission:</strong> Sustained compliance across FDA FAERS, EMA EudraVigilance, and MHRA safety portals.</li><li><strong>Rapid Disproportionality Signal Detection:</strong> Proactive identification of subtle drug-drug interaction clusters before routine periodic safety reports (PBRER).</li></ul></div><p>The result is a robust, audit-proof pharmacovigilance infrastructure that protects patients while eliminating compliance risk for biotech sponsors.</p>', NULL, '5 min read', 'Machine Learning Signal Detection in Pharmacovigilance | AstraClinical', 'Automated natural language processing reducing ICSR intake triage latency by 62% for post-marketing safety surveillance.', 'pharmacovigilance, machine learning, ICSR triage, FAERS, MedDRA coding, drug safety', NULL, NULL, NULL, NULL, 'index, follow', 'BlogPosting', 'Dr. Elena Rostova, MD, PhD', 'Global Head of Drug Safety', 'ER', 0, 1, '2026-08-29 10:00:00', NOW(), NOW()),

(4, 'Adaptive Clinical Trial Designs: Optimizing Sample Size Re-Estimation & Interim Analyses', 'adaptive-biostat', 4, 'Biostatistics', 'Biostatistics', 'Examining Bayesian adaptive algorithms that permit sample size recalculation and early futility stopping without inflating Type I error rates.', '<p>Fixed-sample clinical trials frequently lock sponsors into conservative, over-powered patient recruitment targets or expose programs to premature termination. Adaptive trial designs offer an evidence-based alternative by allowing pre-planned modifications to study parameters based on accumulating interim trial data.</p><p>Our biostatistics and statistical programming teams specialize in group sequential designs, seamless Phase II/III transitions, and response-adaptive randomization schedules that preserve statistical rigor and regulatory defensibility.</p><div class=\"article-takeaway-box\"><h4>Benefits of Adaptive Protocol Architecture</h4><ul><li><strong>Sample Size Optimization:</strong> Recalculate enrollment requirements at interim milestones to prevent underpowered Phase IIb efficacy signals.</li><li><strong>Futility Stopping Rules:</strong> Terminate ineffective dose arms early, preserving capital and redirecting patients to promising therapeutic candidates.</li><li><strong>Strict Type I Error Control:</strong> Comprehensive simulation studies and alpha-spending functions ensure complete compliance with FDA Adaptive Design Guidance.</li></ul></div><p>Biotech sponsors partnering with AstraClinical benefit from end-to-end CDISC SDTM/ADaM programming and independent Data Safety Monitoring Board (DSMB) charter governance.</p>', NULL, '8 min read', 'Adaptive Clinical Trial Designs & Sample Size Re-Estimation | AstraClinical', 'Explore Bayesian adaptive designs, interim analyses, and futility stopping rules compliant with FDA adaptive design guidance.', 'adaptive trial design, sample size recalculation, biostatistics, CDISC, interim analysis', NULL, NULL, NULL, NULL, 'index, follow', 'BlogPosting', 'Dr. Robert Vance, PhD', 'Chief Biostatistician', 'RV', 0, 1, '2026-08-14 10:00:00', NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for `media`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `size` bigint(20) unsigned DEFAULT NULL,
  `alt_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping data for table `media`
-- --------------------------------------------------------
INSERT INTO `media` (`id`, `filename`, `path`, `mime_type`, `size`, `alt_text`, `created_at`, `updated_at`) VALUES
(1, 'clinical-lab.jpg', 'images/clinical-lab.jpg', 'image/jpeg', 245760, 'Central Clinical Laboratory', NOW(), NOW()),
(2, 'doctor-consultation.jpg', 'images/doctor-consultation.jpg', 'image/jpeg', 312320, 'Doctor Consultation', NOW(), NOW()),
(3, 'logo.png', 'images/logo.png', 'image/png', 52140, 'Trevanta International Logo', NOW(), NOW());

SET FOREIGN_KEY_CHECKS = 1;

