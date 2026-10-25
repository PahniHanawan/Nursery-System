-- Little Sprouts Nursery System SQL Dump
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_age_or_dob` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferred_date` date NOT NULL,
  `preferred_time` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intended_start_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','confirmed','cancelled','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `internal_notes` text COLLATE utf8mb4_unicode_ci,
  `gdpr_consent` tinyint(1) NOT NULL DEFAULT '1',
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `bookings` (`id`, `parent_name`, `email`, `phone`, `child_age_or_dob`, `preferred_date`, `preferred_time`, `intended_start_date`, `notes`, `status`, `internal_notes`, `gdpr_consent`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES ('1', 'Elena Rostova', 'elena.rostova@example.com', '+44 7700 900123', '14 months old', '2026-10-26', 'Morning (10:00 AM)', 'Within 1 Month', 'Looking for full-day placement for infant room starting next month as returning to work.', 'pending', 'Followed up via automated confirmation; awaiting parent response for 10am slot.', '1', '127.0.0.1', '2026-10-25 08:32:36', '2026-10-25 08:32:36', NULL);
INSERT INTO `bookings` (`id`, `parent_name`, `email`, `phone`, `child_age_or_dob`, `preferred_date`, `preferred_time`, `intended_start_date`, `notes`, `status`, `internal_notes`, `gdpr_consent`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES ('2', 'David Miller', 'david.miller@example.co.uk', '+44 7700 900456', '2.5 years old', '2026-10-28', 'Afternoon (02:00 PM)', 'Next Term (Autumn)', 'Interested in 3 full days per week. Would like to see the outdoor garden.', 'confirmed', 'Confirmed tour with Sarah on Oct 25. Requested dietary info packet.', '1', '127.0.0.1', '2026-10-25 08:32:36', '2026-10-25 08:32:36', NULL);
INSERT INTO `bookings` (`id`, `parent_name`, `email`, `phone`, `child_age_or_dob`, `preferred_date`, `preferred_time`, `intended_start_date`, `notes`, `status`, `internal_notes`, `gdpr_consent`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES ('3', 'Amina Khan', 'amina.k@example.org', '+44 7700 900789', '9 months old', '2026-10-30', 'Late Afternoon (04:00 PM)', 'Immediately', 'Seeking baby room vacancy for immediate start. Need info on government childcare funding.', 'pending', NULL, '1', '127.0.0.1', '2026-10-25 08:32:36', '2026-10-25 08:32:36', NULL);
INSERT INTO `bookings` (`id`, `parent_name`, `email`, `phone`, `child_age_or_dob`, `preferred_date`, `preferred_time`, `intended_start_date`, `notes`, `status`, `internal_notes`, `gdpr_consent`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES ('4', 'Marcus Thorne', 'm.thorne@example.com', '+44 7700 900321', '3 years old', '2026-10-23', 'Morning (10:00 AM)', 'Spring Term', 'Show-around completed with team lead Claire.', 'completed', 'Parent was very impressed with Reggio Emilia workshop. Waiting for enrollment papers.', '1', '127.0.0.1', '2026-10-25 08:32:36', '2026-10-25 08:32:36', NULL);

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `fee_tiers`;
CREATE TABLE `fee_tiers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `age_group_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_per_day` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `fee_tiers` (`id`, `age_group_name`, `session_type`, `rate_per_day`, `created_at`, `updated_at`) VALUES ('1', 'Under 2s (0 - 24 months)', 'Full Day (08:00 - 18:00)', '78.00', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `fee_tiers` (`id`, `age_group_name`, `session_type`, `rate_per_day`, `created_at`, `updated_at`) VALUES ('2', 'Under 2s (0 - 24 months)', 'Morning Session (08:00 - 13:00)', '48.00', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `fee_tiers` (`id`, `age_group_name`, `session_type`, `rate_per_day`, `created_at`, `updated_at`) VALUES ('3', 'Under 2s (0 - 24 months)', 'Afternoon Session (13:00 - 18:00)', '45.00', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `fee_tiers` (`id`, `age_group_name`, `session_type`, `rate_per_day`, `created_at`, `updated_at`) VALUES ('4', 'Over 2s (2 - 5 years)', 'Full Day (08:00 - 18:00)', '68.00', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `fee_tiers` (`id`, `age_group_name`, `session_type`, `rate_per_day`, `created_at`, `updated_at`) VALUES ('5', 'Over 2s (2 - 5 years)', 'Morning Session (08:00 - 13:00)', '42.00', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `fee_tiers` (`id`, `age_group_name`, `session_type`, `rate_per_day`, `created_at`, `updated_at`) VALUES ('6', 'Over 2s (2 - 5 years)', 'Afternoon Session (13:00 - 18:00)', '39.00', '2026-10-25 08:32:35', '2026-10-25 08:32:35');

DROP TABLE IF EXISTS `gallery_images`;
CREATE TABLE `gallery_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `gallery_images` (`id`, `image_path`, `alt_text`, `sort_order`, `created_at`, `updated_at`) VALUES ('1', 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=1200&q=80', 'Spacious and bright toddler creative play and art workshop room', '1', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `gallery_images` (`id`, `image_path`, `alt_text`, `sort_order`, `created_at`, `updated_at`) VALUES ('2', 'https://images.unsplash.com/photo-1502086223501-7ea6ecd79368?auto=format&fit=crop&w=1200&q=80', 'Green outdoor sensory garden and play equipment with safe soft turf', '2', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `gallery_images` (`id`, `image_path`, `alt_text`, `sort_order`, `created_at`, `updated_at`) VALUES ('3', 'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?auto=format&fit=crop&w=1200&q=80', 'Cozy storytelling and reading library corner with soft cushions', '3', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `gallery_images` (`id`, `image_path`, `alt_text`, `sort_order`, `created_at`, `updated_at`) VALUES ('4', 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=1200&q=80', 'Sensory discovery station with wooden natural blocks and tactile materials', '4', '2026-10-25 08:32:36', '2026-10-25 08:32:36');
INSERT INTO `gallery_images` (`id`, `image_path`, `alt_text`, `sort_order`, `created_at`, `updated_at`) VALUES ('5', 'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=1200&q=80', 'Baby discovery lounge with padded crawling pods and gentle pastel decor', '5', '2026-10-25 08:32:36', '2026-10-25 08:32:36');
INSERT INTO `gallery_images` (`id`, `image_path`, `alt_text`, `sort_order`, `created_at`, `updated_at`) VALUES ('6', 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80', 'Dining and snack area with hygienic child-sized eco bamboo tables', '6', '2026-10-25 08:32:36', '2026-10-25 08:32:36');

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '0001_01_01_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '0001_01_01_000001_create_cache_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '0001_01_01_000002_create_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('4', '2026_10_25_082905_create_bookings_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('5', '2026_10_25_082918_create_fee_tiers_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('6', '2026_10_25_082924_create_gallery_images_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('7', '2026_10_25_082931_create_page_contents_table', '2');

DROP TABLE IF EXISTS `page_contents`;
CREATE TABLE `page_contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page_slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_contents_page_slug_section_key_unique` (`page_slug`,`section_key`),
  KEY `page_contents_page_slug_index` (`page_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('1', 'global', 'nursery_name', 'Little Sprouts Nursery', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('2', 'global', 'phone', '+44 (0) 20 7946 0912', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('3', 'global', 'email', 'admissions@littlesproutsnursery.test', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('4', 'global', 'address', '14 Primrose Lane, Kensington, London, W8 7PT', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('5', 'global', 'opening_hours', 'Monday – Friday: 07:30 AM – 06:00 PM', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('6', 'global', 'announcement', '🎉 Now Enrolling for Autumn & Spring Terms — Book your personalized visit today!', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('7', 'home', 'hero_title', 'Where Curiosity Blooms & Little Minds Thrive', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('8', 'home', 'hero_subtitle', 'Award-winning early years education nurturing empathy, confidence, and creative exploration in a safe, nature-rich environment.', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('9', 'home', 'ethos_summary', 'We combine Reggio Emilia inspired discovery with the EYFS curriculum to build a resilient foundation for lifelong learning.', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('10', 'about', 'ethos_full', 'At Little Sprouts Nursery, we believe that the early childhood years are a unique, golden window for social development, curiosity, and emotional grounding. Our dedicated team of certified educators fosters a child-led atmosphere where every milestone is celebrated.', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('11', 'about', 'safety_standards', 'Our campus features biometric security gates, certified pediatric first-aid trained practitioners on duty throughout all hours, CCTV coverage across common areas, and hygienic organic dining options.', '2026-10-25 08:32:35', '2026-10-25 08:32:35');
INSERT INTO `page_contents` (`id`, `page_slug`, `section_key`, `content_value`, `created_at`, `updated_at`) VALUES ('12', 'contact', 'parking_guidance', 'Complimentary 15-minute visitor parking bays are located directly opposite the reception gate. Stroller and pram storage is provided in the heated entrance lobby.', '2026-10-25 08:32:35', '2026-10-25 08:32:35');

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES ('LV1nUJd5ydA8XvdhX43Ub9Tylkaj1rWTOdqWzSsX', '1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJsOUhpUkxOYVJxdnAxekZUeER4RmsyMVNLb1pQSENHZTRqVUVFdTYyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9wcml2YWN5LXBvbGljeSIsInJvdXRlIjoicHJpdmFjeSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxLCJwYXNzd29yZF9oYXNoX3dlYiI6IjIyNGIxZmMxMTQ0MzYxYTY1YWVlNjU1OTI2OGNjZTUwODdiNDM5ZDU2ZTJkNjkxNzE5Y2M3NDcxYjQ5YzNlMDYifQ==', '1792919684');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES ('1', 'Sarah Jenkins', 'admin@littlesprouts.test', NULL, '$2y$12$zcPyQVdhRLgPHp9IR.MfTO.XckTuzfMeTCnOpZnUBKPa/zFk0XA5y', NULL, '2026-10-25 08:32:34', '2026-10-25 08:32:34');

SET FOREIGN_KEY_CHECKS=1;
