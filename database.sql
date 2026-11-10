-- ========================================================
-- Trevanta International Database Dump
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
(8, '2026_11_03_000005_add_seo_fields_to_blogs_table', 1),
(9, '2026_11_03_000006_create_settings_table', 1);

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
  `author_name` varchar(150) NOT NULL DEFAULT 'Trevanta International Medical Director',
  `author_title` varchar(200) DEFAULT 'Clinical Research Team',
  `author_avatar` varchar(50) DEFAULT 'TI',
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
-- (No demo blogs seeded - ready for dynamic admin entry)

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

-- --------------------------------------------------------
-- Table structure for `settings`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` longtext DEFAULT NULL,
  `group` varchar(50) NOT NULL DEFAULT 'general',
  `type` varchar(50) NOT NULL DEFAULT 'text',
  `label` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`),
  KEY `settings_group_index` (`group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping data for table `settings`
-- --------------------------------------------------------
INSERT INTO `settings` (`key`, `value`, `group`, `type`, `label`, `created_at`, `updated_at`) VALUES
('site_name', 'Trevanta International', 'branding', 'text', 'Company / Brand Name', NOW(), NOW()),
('site_tagline', 'Global Reach, Regional Agility, Patient-Centric Clinical Research', 'branding', 'text', 'Tagline', NOW(), NOW()),
('site_logo', 'images/logo.png', 'branding', 'media_image', 'Primary Header Logo', NOW(), NOW()),
('site_logo_white', 'images/logo-white.png', 'branding', 'media_image', 'Footer White Logo', NOW(), NOW()),
('site_favicon', 'images/logo.png', 'branding', 'media_image', 'Favicon Icon', NOW(), NOW()),
('admin_logo', 'images/logo.png', 'branding', 'media_image', 'Admin Sidebar Logo', NOW(), NOW()),

('contact_email', 'info@trevanta.com', 'contact', 'email', 'Primary General Inquiry Email', NOW(), NOW()),
('rfp_email', 'info@trevanta.com', 'contact', 'email', 'Study RFP & Protocol Email', NOW(), NOW()),
('safety_email', 'safety@trevanta.com', 'contact', 'email', '24/7 Safety & Pharmacovigilance Email', NOW(), NOW()),
('phone_na', '+1 (514) 934-0805', 'contact', 'text', 'Corporate HQ Hotline', NOW(), NOW()),
('phone_safety', '+1 (800) 577-7233', 'contact', 'text', '24/7 SAE & Safety Reporting Hotline', NOW(), NOW()),
('operating_hours', 'Mon–Fri, 8:30 AM – 6:00 PM EST', 'contact', 'text', 'Operating Hours', NOW(), NOW()),

('address_hq', '4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada', 'addresses', 'textarea', 'Corporate HQ (Montreal, Canada)', NOW(), NOW()),
('address_india', 'Express Trade Towers 2, Sector 132, Noida & Mumbai, India', 'addresses', 'textarea', 'India Operations Hub', NOW(), NOW()),
('address_uae', 'Dubai Science Park, Nucleus Tower, Dubai, United Arab Emirates', 'addresses', 'textarea', 'Middle East Regional Office', NOW(), NOW()),
('address_uk', '124 City Road, London EC1V 2NX, United Kingdom', 'addresses', 'textarea', 'UK & Europe Liaison Office', NOW(), NOW()),

('home_meta_title', 'Trevanta International | Global Clinical Research Organization (CRO)', 'seo', 'text', 'Homepage Meta Title', NOW(), NOW()),
('home_meta_description', 'Trevanta International is an international full-service Clinical Research Organization providing Phase I-IV trials, Pharmacovigilance, Regulatory Affairs, and Biostatistics across North America, Europe, Latin America, and Asia.', 'seo', 'textarea', 'Homepage Meta Description', NOW(), NOW()),
('home_meta_keywords', 'clinical research organization, CRO, Phase I-IV trials, pharmacovigilance, regulatory affairs, biostatistics, ICH GCP, clinical trials, Trevanta International', 'seo', 'textarea', 'Homepage Focus Keywords', NOW(), NOW()),
('home_og_image', 'images/doctor-consultation.jpg', 'seo', 'media_image', 'Homepage Social Share Banner (OG Image)', NOW(), NOW()),
('meta_robots_default', 'index, follow', 'seo', 'text', 'Search Robots Directive', NOW(), NOW()),
('canonical_url_base', 'https://trevanta.bluebasetechnologies.com', 'seo', 'url', 'Canonical Base URL', NOW(), NOW()),

('social_linkedin', 'https://www.linkedin.com/company/trevanta-international', 'social', 'url', 'LinkedIn URL', NOW(), NOW()),
('social_twitter', 'https://twitter.com/trevantacro', 'social', 'url', 'Twitter / X URL', NOW(), NOW()),
('footer_about', 'A globally recognized Clinical Research Organization delivering multi-national trial management, high-volume patient recruitment, and comprehensive pharmacovigilance across international regulatory authorities.', 'social', 'textarea', 'Footer About Blurb', NOW(), NOW()),
('footer_copyright', '© 2026 Trevanta International Inc. All rights reserved. Compliant with 21 CFR Part 11, ICH-GCP, and GDPR.', 'social', 'text', 'Footer Copyright Notice', NOW(), NOW()),

('careers_eyebrow', 'PEOPLE & CULTURE', 'careers', 'text', 'Careers Section Eyebrow', NOW(), NOW()),
('careers_heading', 'Join a team committed to improving global health.', 'careers', 'text', 'Careers Page Heading', NOW(), NOW()),
('careers_description', 'At Trevanta International our people are at the heart of innovation. We foster a culture of collaboration, growth, and scientific excellence.', 'careers', 'textarea', 'Careers Page Description', NOW(), NOW()),
('careers_email', 'info@trevanta.com', 'careers', 'email', 'Careers Inquiry Email', NOW(), NOW()),

('careers_feat1_title', 'Global Cross-Functional Collaboration', 'careers', 'text', 'Culture Highlight 1 Title', NOW(), NOW()),
('careers_feat1_desc', 'Multi-national clinical teams operating across North America, Europe, and Asia.', 'careers', 'textarea', 'Culture Highlight 1 Description', NOW(), NOW()),
('careers_feat2_title', 'Continuous Growth & GCP Certification', 'careers', 'text', 'Culture Highlight 2 Title', NOW(), NOW()),
('careers_feat2_desc', 'Comprehensive continuing education, international GCP credentials, and leadership tracks.', 'careers', 'textarea', 'Culture Highlight 2 Description', NOW(), NOW()),
('careers_feat3_title', 'High-Impact Clinical Research', 'careers', 'text', 'Culture Highlight 3 Title', NOW(), NOW()),
('careers_feat3_desc', 'Direct involvement in pivotal Phase I–IV trials delivering life-saving medical innovations.', 'careers', 'textarea', 'Culture Highlight 3 Description', NOW(), NOW()),
('careers_feat4_title', 'Flexible Infrastructure & Modern Systems', 'careers', 'text', 'Culture Highlight 4 Title', NOW(), NOW()),
('careers_feat4_desc', 'Modern digital clinical systems, flexible work models, and collaborative support.', 'careers', 'textarea', 'Culture Highlight 4 Description', NOW(), NOW()),

('careers_motto_tag', 'OUR COMMITMENT', 'careers', 'text', 'Motto Card Badge', NOW(), NOW()),
('careers_motto_quote', 'Our world-class team of highly qualified and experienced workforce enables us to meet client expectations and deliver projects within the timeframe.', 'careers', 'textarea', 'Motto Card Quote', NOW(), NOW()),
('careers_motto_author', 'Executive Leadership Board', 'careers', 'text', 'Motto Card Author', NOW(), NOW()),
('careers_motto_org', 'Trevanta International', 'careers', 'text', 'Motto Card Organization', NOW(), NOW());

-- --------------------------------------------------------
-- Table structure for `job_openings`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `job_openings`;
CREATE TABLE `job_openings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `job_type` varchar(50) NOT NULL DEFAULT 'Full-Time',
  `location` varchar(255) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `description` text NOT NULL,
  `requirements` longtext DEFAULT NULL,
  `apply_email` varchar(255) DEFAULT NULL,
  `apply_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_openings_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for `job_applications`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `job_applications`;
CREATE TABLE `job_applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `job_opening_id` bigint(20) unsigned DEFAULT NULL,
  `position_title` varchar(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `current_location` varchar(150) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `resume_path` varchar(255) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'new',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_applications_job_opening_id_foreign` (`job_opening_id`),
  CONSTRAINT `job_applications_job_opening_id_foreign` FOREIGN KEY (`job_opening_id`) REFERENCES `job_openings` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------
-- Table structure for `policies`
-- -------------------------------------------------------------
DROP TABLE IF EXISTS `policies`;
CREATE TABLE `policies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `effective_date` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `policies_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `policies` (`id`, `title`, `slug`, `summary`, `content`, `effective_date`, `is_active`, `order`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Statement', 'privacy-statement', 'Comprehensive information regarding how Trevanta International collects, protects, processes, and respects clinical and website visitor personal data in compliance with GDPR, HIPAA, and PIPEDA.', '<h3>1. Commitment to Data Privacy</h3>\r\n<p>At Trevanta International, protecting the confidentiality, integrity, and privacy of personal data entrusted to us by clinical trial participants, investigators, sponsor representatives, and website visitors is paramount to our mission. This Privacy Statement details our practices governing information collection, usage, cross-border transmission, and regulatory compliance under the General Data Protection Regulation (EU GDPR / UK GDPR), the Health Insurance Portability and Accountability Act (HIPAA), and the Personal Information Protection and Electronic Documents Act (PIPEDA).</p>\r\n\r\n<h3>2. Clinical Trial Data & De-Identification</h3>\r\n<p>Clinical data gathered during clinical investigations managed by Trevanta International is processed strictly under pseudonymized, coded identifiers pursuant to ICH-GCP E6(R2/R3) guidelines. Direct participant personal identifiers (such as legal name, government identification numbers, and residential addresses) are never stored in central clinical databases or transferred across jurisdictions without strict key-coded pseudonymization managed exclusively by the respective investigative site.</p>\r\n\r\n<h3>3. Data Collection Across Corporate Operations</h3>\r\n<p>When interacting with our corporate digital platforms, we may collect:</p>\r\n<ul>\r\n  <li><strong>Direct Contact Inquiries:</strong> Professional contact details including your full name, institutional email address, organization/sponsor name, telephone number, and therapeutic interests submitted via inquiry forms or RFP requests.</li>\r\n  <li><strong>Technical & Analytical Diagnostics:</strong> IP address, browser user-agent, operating system, referral URL, and aggregated telemetry necessary to maintain site security and optimize service reliability.</li>\r\n  <li><strong>Recruitment Data:</strong> Curriculum vitae, professional certifications, licensure verification, and employment history submitted for career openings.</li>\r\n</ul>\r\n\r\n<h3>4. Legal Basis & Data Retention</h3>\r\n<p>We process personal data solely based on legitimate commercial interest, performance of clinical services contracts, compliance with international regulatory recordkeeping obligations (e.g., 25-year clinical trial master file archiving mandates), or explicit consent provided by the data subject.</p>\r\n\r\n<h3>5. Data Subject Rights & Contact</h3>\r\n<p>You maintain the right to access, rectify, restrict processing of, or request erasure of your non-regulatory personal data. For privacy inquiries or to exercise your statutory rights, please contact our Data Protection Officer at <a href=\"mailto:privacy@trevanta.com\">privacy@trevanta.com</a> or write to: <em>Data Protection Office, Trevanta International Inc., 4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada</em>.</p>', 'January 1, 2026', 1, 1, 'Privacy Statement & Data Protection | Trevanta International', 'Learn how Trevanta International protects clinical data and visitor privacy in compliance with GDPR, HIPAA, PIPEDA, and ICH-GCP international guidelines.', NOW(), NOW()),
(2, 'Terms of Use', 'terms-of-use', 'Terms and conditions governing the access, browsing, and use of Trevanta International corporate digital portals, proprietary publications, and study portals.', '<h3>1. Acceptance of Terms</h3>\r\n<p>By accessing or utilizing the website, digital portals, or scientific resources provided by Trevanta International Inc. (\"Trevanta\", \"we\", \"our\"), you acknowledge that you have read, understood, and agreed to be legally bound by these Terms of Use and applicable international laws.</p>\r\n\r\n<h3>2. Scientific and Informational Disclaimers</h3>\r\n<p>The materials, whitepapers, clinical timelines, and regulatory perspectives made available on this website are published solely for general informational, educational, and business-to-business evaluation purposes. Nothing contained herein constitutes formal medical diagnosis, clinical treatment advice, regulatory commitment, or warranty of drug approval by any health authority.</p>\r\n\r\n<h3>3. Intellectual Property Rights</h3>\r\n<p>All trademarks, service marks, clinical methodologies, software architectures, graphics, and written publications displayed across this website are the proprietary intellectual property of Trevanta International or its content licensors, protected by Canadian, United States, and international copyright and intellectual property conventions.</p>\r\n\r\n<h3>4. Permitted and Restricted Use</h3>\r\n<p>You agree not to duplicate, reverse engineer, scrape, deploy automated data-gathering robots, or inject malicious code into any component of this digital platform. Unauthorized access to restricted sponsor portals or clinical systems will be prosecuted to the maximum extent permitted by applicable civil and criminal statutes.</p>\r\n\r\n<h3>5. Governing Law and Jurisdiction</h3>\r\n<p>These Terms shall be interpreted, construed, and enforced in accordance with the laws of the Province of Quebec and the federal laws of Canada applicable therein, without regard to conflict of law principles.</p>', 'January 1, 2026', 1, 2, 'Terms of Use & Legal Notice | Trevanta International', 'Review the terms and conditions governing the access and utilization of Trevanta International corporate digital portals and research publications.', NOW(), NOW()),
(3, 'GCP Statement', 'gcp-statement', 'Official Quality Assurance and Good Clinical Practice (ICH-GCP E6 R2/R3) compliance framework adhered to by Trevanta International clinical operations worldwide.', '<h3>1. Global Quality & Regulatory Commitment</h3>\r\n<p>Trevanta International is fully committed to maintaining the highest ethical, scientific, and quality standards across all phases of human clinical research. Our clinical operations, biostatistics, pharmacovigilance, and monitoring infrastructures strictly adhere to the International Council for Harmonisation Good Clinical Practice guidelines (ICH-GCP E6 R2 and emerging E6 R3 recommendations), the Declaration of Helsinki, US FDA Title 21 Code of Federal Regulations (21 CFR Parts 11, 50, 54, 56, and 312), EU Clinical Trials Regulation (CTR EU No 536/2014), and Health Canada Food and Drugs Act Regulations.</p>\r\n\r\n<h3>2. Standard Operating Procedures (SOPs) & Validation</h3>\r\n<p>All clinical trials executed by Trevanta operate under a rigorous, audited system of comprehensive Standard Operating Procedures (SOPs). Our computer systems validation (CSV) lifecycle complies rigorously with GAMP 5 principles, guaranteeing that all Electronic Data Capture (EDC), Clinical Trial Management Systems (CTMS), and eTMF repositories maintain 21 CFR Part 11 compliant immutable audit trails, electronic signatures, and tamper-evident access logs.</p>\r\n\r\n<h3>3. Independent Quality Assurance Unit</h3>\r\n<p>Our dedicated, independent Quality Assurance (QA) Unit operates autonomously from operational trial teams. QA auditors perform regular risk-based internal system audits, investigator site audits, vendor qualification reviews, and mock regulatory inspections to ensure audit-readiness at all milestones of every clinical study.</p>\r\n\r\n<h3>4. Ethics Committee Oversight & Participant Safety</h3>\r\n<p>No clinical protocol or investigational product testing is initiated without prior written authorization from applicable Institutional Review Boards (IRBs) / Independent Ethics Committees (IECs) and relevant national health authorities. Uncompromised human subject protection and verifiable data veracity represent our core institutional mandate.</p>', 'January 1, 2026', 1, 3, 'ICH-GCP Quality & Compliance Statement | Trevanta International', 'Read Trevanta International Good Clinical Practice (GCP) quality policy, 21 CFR Part 11 compliance framework, and clinical trial assurance standards.', NOW(), NOW()),
(4, 'Whistleblower Notice', 'whistleblower-notice', 'Confidential and anonymous reporting procedures for ethical concerns, trial integrity issues, GCP deviations, or corporate compliance matters.', '<h3>1. Institutional Policy on Ethical Integrity</h3>\r\n<p>Trevanta International maintains a strict zero-tolerance policy against unethical conduct, research misconduct, regulatory non-compliance, financial impropriety, harassment, and retaliation. We encourage all employees, investigators, contractors, study coordinators, and sponsor partners to report any suspected breach of regulatory standards or ethical policies.</p>\r\n\r\n<h3>2. Confidential & Anonymous Reporting Channels</h3>\r\n<p>Suspected violations of Good Clinical Practice, protocol non-compliance, data falsification, workplace misconduct, or financial irregularities may be reported through several confidential channels:</p>\r\n<ul>\r\n  <li><strong>Ethics & Compliance Hotline:</strong> Available 24 hours a day, 7 days a week with multi-language operator support.</li>\r\n  <li><strong>Direct Compliance Email:</strong> <a href=\"mailto:compliance@trevanta.com\">compliance@trevanta.com</a></li>\r\n  <li><strong>Postal Communication:</strong> <em>Chief Compliance Officer, Confidential Whistleblower Intake, Trevanta International, 4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada</em>.</li>\r\n</ul>\r\n\r\n<h3>3. Absolute Protection Against Retaliation</h3>\r\n<p>Trevanta International strictly prohibits retaliation, adverse employment action, discrimination, or reprisal of any kind against any individual who submits a report in good faith or participates in an investigation. Any employee or manager found to have engaged in retaliatory behavior is subject to immediate termination and potential legal liability.</p>\r\n\r\n<h3>4. Investigation Procedure & Governance</h3>\r\n<p>Every report received is cataloged, acknowledged within two business days, and assigned to an independent investigation officer. Corrective and Preventive Action (CAPA) plans are implemented promptly when necessary, and reports are summarized periodically to the Board of Directors Audit & Compliance Committee.</p>', 'January 1, 2026', 1, 4, 'Whistleblower & Corporate Ethics Notice | Trevanta International', 'Review Trevanta International confidential whistleblower channels, zero-retaliation protections, and reporting mechanisms for research integrity.', NOW(), NOW());

SET FOREIGN_KEY_CHECKS = 1;

