-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2025 at 07:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acorn`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `mission` longtext DEFAULT NULL,
  `vision` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `featured_image`, `description`, `mission`, `vision`, `created_at`, `updated_at`) VALUES
(1, 'abouts/iuFObsTmAexVYbCNmhlgAZow7PLFBfzQItUh87du.jpg', '<p>Acorn was born in 1990 with a simple yet powerful vision: to create a school where every child, whether neurodiverse or neurotypical, could learn side by side in an atmosphere of dignity, care, and opportunity.</p><p>From its earliest days, Acorn sought to be more than a school. We have become a home of possibility, offering early intervention, individualised learning, vocational pathways, and therapeutic support. At the heart of it all was one belief: <i>every learner carries unique gifts worth celebrating.</i></p><p>&nbsp;</p><p>Over the years, Acorn grew into a beacon of inclusive education in Kenya, rooted in the spirit of <strong>Ubuntu — “I am because we are.”</strong> Ubuntu shapes how we teach, how we listen, and how we walk alongside families, educators, and communities. It reminds us that no child should walk alone, and no family should be left behind.</p><p>&nbsp;</p><p>Today, Acorn continues to evolve. We have expanded our services to include assessments, consultation, training, and community empowerment, weaving together learners, parents, schools, and society into a single circle of belonging. Our journey is one of nurturing potential, honoring resilience, and building futures together.</p>', 'We exist to nurture potential, ignite hope, and empower lives. Through high-quality assessments, compassionate consultation, and transformative training, we walk with learners, families, and educators on their journey. Guided by the spirit of Ubuntu — I am because we are,  we create spaces where challenges are met with care, strengths are honored as gifts, and every step forward is celebrated as a victory for us all.', 'To see an Africa where every learner, regardless of ability, background, or circumstance, is welcomed, celebrated, and given the chance to shine. We envision schools and communities transformed into havens of dignity and belonging, where diversity is embraced as strength, and where children grow with the confidence that they matter, they are loved, and they can contribute to the world.', '2025-10-15 09:36:06', '2025-10-15 09:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appointment_datetime` datetime NOT NULL,
  `duration_minutes` int(11) NOT NULL DEFAULT 60,
  `service_type` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `meeting_type` enum('in_person','virtual') NOT NULL DEFAULT 'virtual',
  `meeting_link` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `consultation_fee` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('unpaid','paid') NOT NULL DEFAULT 'unpaid',
  `status` enum('pending','confirmed','cancelled','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `subtitle_two` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT 'Read More',
  `button_link` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kyc_token` char(36) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_values`
--

CREATE TABLE `core_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_values`
--

INSERT INTO `core_values` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Inclusivity', 'We believe there is room for everyone at the table. Every learner, parent, and teacher has a place, a voice, and a gift to share.', '2025-10-15 09:54:51', '2025-10-15 09:54:51'),
(2, 'Respect', 'We honor the dignity of every human being. We listen with empathy, act with compassion, and treat each child as someone’s most precious treasure.', '2025-10-15 09:55:07', '2025-10-15 09:55:07'),
(3, 'Collaboration', 'We walk together. Families, schools, communities, and professionals are partners on the same journey, lifting one another so that no one is left behind.', '2025-10-15 09:55:21', '2025-10-15 09:55:21'),
(4, 'Innovation', 'We keep learning, creating, and adapting. By embracing new ideas and evidence-based practices, we find better ways to meet real needs in real lives.', '2025-10-15 09:55:34', '2025-10-15 09:55:34'),
(5, 'Integrity', 'We build trust through honesty and fairness. Our words and actions align, always guided by accountability and care for the people we serve.', '2025-10-15 09:55:47', '2025-10-15 09:55:47'),
(6, 'Excellence', 'We give our very best because our children deserve nothing less. Every assessment, every training, every plan is crafted with quality that lasts.', '2025-10-15 09:56:04', '2025-10-15 09:56:04'),
(7, 'Empowerment', 'We don’t just provide services , we awaken strength. We equip learners, parents, and educators to take ownership of their growth and to shine as leaders in their communities.\r\n\r\n In the spirit of Ubuntu, these values are not ideals they are ways of being, woven into every smile, every lesson, every handshake, and every child’s success story at Acorn.', '2025-10-15 09:56:20', '2025-10-15 09:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `founders`
--

CREATE TABLE `founders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `roles` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `catalyst_for_change` text DEFAULT NULL,
  `community_impact` text DEFAULT NULL,
  `leadership` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `founders`
--

INSERT INTO `founders` (`id`, `name`, `title`, `roles`, `about`, `catalyst_for_change`, `community_impact`, `leadership`, `created_at`, `updated_at`) VALUES
(1, 'Eva Naputuni Nyoike, OGW', 'Director', 'Founder of Acorn Special Tutorials | Chair, ASNEN | Inclusive Education Consultant | Advocate for Children’s Rights', '<p>Eva Naputuni Nyoike is a visionary leader, educator, and advocate whose life’s work has been guided by the spirit of <strong>Ubuntu — </strong><i><strong>I am because we are</strong></i><strong>.</strong> For over 35 years, she has dedicated herself to ensuring that children with disabilities and special needs are seen, supported, and given the chance to thrive.</p><p>&nbsp;</p><p>Eva is the Founder and Director of <strong>Acorn Special Tutorials</strong>, a pioneering inclusive education program in Kenya, and the Founder and Chair of the <strong>Africa Special Needs Education Network (ASNEN)</strong>, which brings together families, educators, and policymakers across the continent. She also serves as Secretary of the <strong>Eastern Africa Academy of Childhood Disability (EAACD)</strong> and is a member of the <strong>International Academy of Childhood Disability (IACD).</strong></p><p>&nbsp;</p><p>In 2021, Eva was awarded the <strong>Order of the Grand Warrior (OGW)</strong> by the President of Kenya in recognition of her outstanding service to education and disability inclusion.</p>', '<p>Eva’s work is marked by her ability to bridge worlds: classrooms and policy halls, families and institutions, local communities and international partners. She has:</p><p>&nbsp;</p><ul><li><strong>Shaped Policy and Curriculum</strong> – Serving as a consultant for Kenya’s Competency-Based Curriculum (CBC), the Directorate of Children’s Services, UNICEF, and UNODC, she has helped design inclusive frameworks that are practical and transformative.</li><li>&nbsp;</li><li><strong>Equipped Educators</strong> – Trained hundreds of teachers and professionals across Eastern Africa in inclusive education, differentiated instruction, and child-centered learning.</li><li>&nbsp;</li><li><strong>Driven Knowledge Building</strong> – Authored <i>“An Introduction to Teaching Students with Special Needs”</i> and developed national training manuals for caregivers of children with disabilities.</li><li>&nbsp;</li><li><strong>Advanced Global Advocacy</strong> – Served as Technical Advisor to the Beyond Zero Initiative on disability issues and represented Eastern Africa on international disability platforms.</li><li>&nbsp;</li><li><strong>Pioneered Interventions</strong> – As the only certified <strong>Auditory Integration Training Practitioner</strong> in Eastern Africa, Eva has introduced life-changing interventions for children with sensory processing challenges.</li></ul>', '<p>Eva’s heart beats not only for systems change, but also for families. She has:</p><ul><li>Led <strong>parent empowerment and support groups</strong>, equipping caregivers with advocacy and income-generating skills.</li><li>Organized <strong>Komolion outreach projects</strong> to register children with disabilities, link them to healthcare, and ensure access to government support.</li><li>Spearheaded relief efforts during the COVID-19 pandemic, mobilizing food and essentials for families of children with disabilities.</li></ul><p>Her approach is always holistic: supporting not just the learner, but the family and community around them.</p>', '<p>Eva is more than an educator , she is a bridge builder, a systems shaper, and a compassionate advocate. Her leadership embodies Ubuntu: <i>when one child rises, we all rise.</i></p>', NULL, '2025-10-15 09:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `consultant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `client_phone` varchar(255) DEFAULT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL DEFAULT '2025-10-14',
  `due_date` date DEFAULT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `hours` int(11) NOT NULL DEFAULT 1,
  `rate_per_hour` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `tax_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` enum('mpesa','bank_transfer','cash','card') DEFAULT NULL,
  `payment_status` enum('unpaid','partial','paid','refunded') NOT NULL DEFAULT 'unpaid',
  `transaction_reference` varchar(255) DEFAULT NULL,
  `status` enum('draft','sent','paid','cancelled') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `appointment_id`, `user_id`, `consultant_id`, `client_name`, `client_email`, `client_phone`, `invoice_number`, `invoice_date`, `due_date`, `service_type`, `hours`, `rate_per_hour`, `subtotal`, `tax_amount`, `total_amount`, `payment_method`, `payment_status`, `transaction_reference`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 34, 'aa', 'aaaa@aaa.com', '0790841987', '12', '2025-10-15', '2025-10-25', 'Consultation', 1, 12500.00, 12500.00, 0.00, 12500.00, 'mpesa', 'unpaid', 'sffafasff', 'draft', '2025-10-14 11:54:40', '2025-10-14 12:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

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
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kyc_submissions`
--

CREATE TABLE `kyc_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `document_image` varchar(255) NOT NULL,
  `selfie_image` varchar(255) NOT NULL,
  `liveliness_data` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legals`
--

CREATE TABLE `legals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legals`
--

INSERT INTO `legals` (`id`, `page`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'terms', 'Terms and Conditions', 'Terms and Conditions', NULL, NULL),
(2, 'privacy', 'Privacy Policy', 'Privacy Policy', NULL, NULL),
(3, 'booking', 'Booking Policy', 'Booking Policy', NULL, NULL),
(4, 'copyright', 'Copyright Statement', 'Copyright Statement', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_03_090435_add_role_to_users_table', 1),
(5, '2025_10_03_120504_create_settings_table', 1),
(6, '2025_10_03_124419_create_carousels_table', 1),
(7, '2025_10_04_100158_create_abouts_table', 1),
(8, '2025_10_04_125031_create_faqs_table', 1),
(9, '2025_10_04_143544_create_services_table', 1),
(10, '2025_10_06_075826_create_feedback_table', 1),
(11, '2025_10_06_083133_create_blogs_table', 1),
(12, '2025_10_06_145532_create_clients_table', 1),
(13, '2025_10_06_165143_create_legals_table', 1),
(14, '2025_10_07_171336_create_notifications_table', 1),
(15, '2025_10_07_174628_create_sms_table', 1),
(16, '2025_10_08_064228_create_subscribers_table', 1),
(17, '2025_10_08_072746_create_kyc_submissions_table', 1),
(18, '2025_10_08_100255_add_kyc_token_to_clients_table', 1),
(19, '2025_10_08_100822_add_kyc_token_to_users_table', 1),
(20, '2025_10_09_072343_create_bookings_table', 1),
(21, '2025_10_09_121818_create_invoices_tables', 1),
(22, '2025_10_09_121818_create_invoices_table', 2),
(23, '2025_10_14_144803_create_appointments_table', 3),
(24, '2025_10_14_000001_create_mpesa_stk_payments_table', 4),
(25, '2025_10_14_000002_create_mpesa_c2b_payments_table', 4),
(26, '2025_10_15_114843_create_founders_table', 5),
(27, '2025_10_15_123751_create_purposes_table', 6),
(28, '2025_10_15_124849_create_core_values_table', 7),
(29, '2025_10_15_130842_create_traffic_tasble', 8),
(30, '2025_10_15_130842_create_traffisc_table', 9),
(31, '2025_10_15_130842_create_traffic_table', 10),
(32, '2025_10_15_134732_add_url_to_traffic_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_c2b_payments`
--

CREATE TABLE `mpesa_c2b_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type` varchar(255) DEFAULT NULL,
  `trans_id` varchar(255) NOT NULL,
  `trans_time` varchar(255) DEFAULT NULL,
  `trans_amount` decimal(10,2) DEFAULT NULL,
  `business_short_code` varchar(255) DEFAULT NULL,
  `bill_ref_number` varchar(255) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `org_account_balance` varchar(255) DEFAULT NULL,
  `third_party_trans_id` varchar(255) DEFAULT NULL,
  `msisdn` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `raw_payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`raw_payload`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpesa_c2b_payments`
--

INSERT INTO `mpesa_c2b_payments` (`id`, `transaction_type`, `trans_id`, `trans_time`, `trans_amount`, `business_short_code`, `bill_ref_number`, `invoice_number`, `org_account_balance`, `third_party_trans_id`, `msisdn`, `first_name`, `middle_name`, `last_name`, `raw_payload`, `created_at`, `updated_at`) VALUES
(1, 'PayBill', 'C2BPZGAHEJP', '20251012172528', 1500.00, '123456', 'INV1001', 'INV1001', '50000.00', NULL, '254712345678', 'John', 'K.', 'Doe', '{\"status\":\"Completed\",\"message\":\"Payment received\"}', '2025-10-14 14:25:28', '2025-10-14 14:25:28'),
(2, 'BuyGoods', 'C2BDXUASUYT', '20251013172528', 2800.50, '654321', 'INV1002', 'INV1002', '70000.00', NULL, '254798765432', 'Jane', 'M.', 'Smith', '{\"status\":\"Completed\",\"message\":\"Payment received\"}', '2025-10-14 14:25:28', '2025-10-14 14:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_stk_payments`
--

CREATE TABLE `mpesa_stk_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `merchant_request_id` varchar(255) DEFAULT NULL,
  `checkout_request_id` varchar(255) DEFAULT NULL,
  `result_code` varchar(255) DEFAULT NULL,
  `result_desc` varchar(255) DEFAULT NULL,
  `mpesa_receipt_number` varchar(255) DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  `raw_response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`raw_response`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpesa_stk_payments`
--

INSERT INTO `mpesa_stk_payments` (`id`, `user_id`, `phone_number`, `amount`, `merchant_request_id`, `checkout_request_id`, `result_code`, `result_desc`, `mpesa_receipt_number`, `transaction_date`, `status`, `raw_response`, `created_at`, `updated_at`) VALUES
(1, 1, '254712345678', 1500.00, 'b54a43bf-7c1e-4693-8e59-4a6d6baf35ee', '90429ce8-81f1-4293-879b-f08565ee6786', '0', 'The service request is processed successfully.', 'QFG12345XY', '2025-10-12 17:21:20', 'success', '{\"MerchantRequestID\":\"12345\",\"CheckoutRequestID\":\"67890\",\"ResultCode\":0,\"ResultDesc\":\"Processed successfully\"}', '2025-10-14 14:21:20', '2025-10-14 14:21:20'),
(2, 2, '254798765432', 3000.00, 'f97d543d-8b18-4d53-8ef2-584a826b290d', 'a8219769-d866-4c92-9880-965d0962939c', '1', 'Request cancelled by user.', NULL, '2025-10-13 17:21:20', 'failed', '{\"ResultCode\":1,\"ResultDesc\":\"Request cancelled by user\"}', '2025-10-14 14:21:20', '2025-10-14 14:21:20'),
(3, NULL, '254701234567', 2500.00, 'dbdb7887-d09c-40c4-b900-04f0c277d585', '91826304-e9bf-43e2-923d-fe641cd964bc', NULL, NULL, NULL, NULL, 'pending', NULL, '2025-10-14 14:21:20', '2025-10-14 14:21:20'),
(4, 1, '254712345678', 1500.00, 'b1684296-f739-42e1-8f25-8d8e4017f3b8', '2d30a9e7-7c76-4345-9f12-c1c36fb7db78', '0', 'The service request is processed successfully.', 'QFG12345XY', '2025-10-12 17:23:22', 'success', '{\"MerchantRequestID\":\"12345\",\"CheckoutRequestID\":\"67890\",\"ResultCode\":0,\"ResultDesc\":\"Processed successfully\"}', '2025-10-14 14:23:22', '2025-10-14 14:23:22'),
(5, 2, '254798765432', 3000.00, 'f0033762-91c3-4360-8ddc-18ec1beb945a', '1ca15083-761b-4522-9df9-aac6b65b8d22', '1', 'Request cancelled by user.', NULL, '2025-10-13 17:23:22', 'failed', '{\"ResultCode\":1,\"ResultDesc\":\"Request cancelled by user\"}', '2025-10-14 14:23:22', '2025-10-14 14:23:22'),
(6, NULL, '254701234567', 2500.00, 'b66719df-ba6c-4c93-a147-9d83b088830b', '4e101729-0f02-47d8-94a2-2a538baeeb89', NULL, NULL, NULL, NULL, 'pending', NULL, '2025-10-14 14:23:22', '2025-10-14 14:23:22'),
(7, 1, '254712345678', 1500.00, '4dff9ed3-f144-4511-8c00-556c4e3c5c4b', '5de52e0a-4b79-4798-93a0-33167e022ca2', '0', 'The service request is processed successfully.', 'QFG12345XY', '2025-10-12 17:25:28', 'success', '{\"MerchantRequestID\":\"12345\",\"CheckoutRequestID\":\"67890\",\"ResultCode\":0,\"ResultDesc\":\"Processed successfully\"}', '2025-10-14 14:25:28', '2025-10-14 14:25:28'),
(8, 2, '254798765432', 3000.00, '42975c09-e823-4a55-9344-bce950e05325', '26ffa70f-10c5-4b9d-842c-bfcf13b24484', '1', 'Request cancelled by user.', NULL, '2025-10-13 17:25:28', 'failed', '{\"ResultCode\":1,\"ResultDesc\":\"Request cancelled by user\"}', '2025-10-14 14:25:28', '2025-10-14 14:25:28'),
(9, NULL, '254701234567', 2500.00, '1ed5681e-766f-4061-afd8-532336dec6ba', '768db359-53d2-4d65-a768-a4a644f7c438', NULL, NULL, NULL, NULL, 'pending', NULL, '2025-10-14 14:25:28', '2025-10-14 14:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purposes`
--

CREATE TABLE `purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'Our Purpose',
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purposes`
--

INSERT INTO `purposes` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Our Purpose', '<p>At Acorn, our purpose is simple yet profound: to be a bridge of hope, connection, and possibility.</p><ul><li>🌱 <strong>For learners:</strong> We open doors to discovery, designing personalized pathways that help every child grow, flourish, and believe in their own brilliance.</li><li>💙 <strong>For parents and families:</strong> We walk alongside you, offering guidance, encouragement, and strength, so that no family ever feels alone on this journey.</li><li>📚 <strong>For schools and educators:</strong> We equip teachers with knowledge, tools, and confidence to create classrooms where diversity is celebrated, not feared.</li><li>🌍 <strong>For society:</strong> We stand as advocates for inclusion and dignity, raising awareness, breaking down barriers, and building communities where everyone belongs.</li></ul><p>In the spirit of <strong>Ubuntu — I am because we are</strong> — our purpose is to weave these threads together into a fabric of belonging, where each learner’s story is honored and each step forward uplifts us all.</p>', '2025-10-15 09:39:51', '2025-10-15 09:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `image`, `short_description`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Assessments', 'assessments', 'services/cLB2c2ix2TjnEmXCubWxEi6yDap0UDTPf5rkeWCg.png', NULL, '<p><strong>Seeing the whole child.</strong><br>We provide comprehensive educational and developmental assessments that reveal both strengths and challenges. Every report comes with clear, practical recommendations that guide parents and teachers in supporting each learner’s journey.</p>', 1, '2025-10-15 08:23:28', '2025-10-15 08:23:28'),
(2, 'Individualized Education Plans (IEPs)', 'individualized-education-plans-ieps', 'services/J0Zi0TLXlJqmfPna9LAAJCNqeAG5N3CZO9eSXbeF.jpg', NULL, '<p><strong>No two learners are alike.</strong><br>Our IEPs are tailored, measurable, and collaborative — designed with parents, teachers, and therapists working hand in hand. Each plan is reviewed regularly so children grow with consistent, meaningful progress.</p>', 1, '2025-10-15 08:25:18', '2025-10-15 08:25:18'),
(3, 'Auditory Integration Therapy (AIT)', 'auditory-integration-therapy-ait', 'services/iYHi9DUga8KgILZ4SyBibnXq5wsBi7cS6hSYHhZv.jpg', NULL, '<p><strong>Specialized support, unique expertise.</strong><br>As the only certified AIT provider in Eastern Africa, we help learners with auditory and sensory processing challenges improve listening, concentration, and daily comfort — empowering them to learn and participate with confidence.</p>', 1, '2025-10-15 08:26:15', '2025-10-15 08:26:15'),
(4, 'Consultation Services', 'consultation-services', 'services/sKKG9tuxBFpXg31gXdhZ91XpDuxgsiIRZeOz5gdn.png', NULL, '<p><strong>Walking the journey together.</strong><br>From guiding parents through new diagnoses to helping schools adopt inclusive practices, we provide practical, compassionate, evidence-based consultation. Families and institutions don’t have to walk alone.</p>', 1, '2025-10-15 08:34:17', '2025-10-15 08:34:17'),
(5, 'Training & Capacity Building', 'training-capacity-building', 'services/A5pSfWDjNdfa7wX9swL3rv0XB8HOSXTDJvKQgooD.png', NULL, '<p><strong>Knowledge that transforms communities.</strong><br>We equip teachers, caregivers, and professionals with practical skills to bring inclusion to life in classrooms and communities. Our trainings are interactive, context-driven, and rooted in decades of expertise.</p>', 1, '2025-10-15 08:35:53', '2025-10-15 08:35:53'),
(6, 'Inclusive School Support', 'inclusive-school-support', 'services/PCYfLKFx3XOeAeL8nY2mYwPc7YwJMD3DZfd9Tzip.png', NULL, '<p><strong>Every child belongs.</strong><br>We partner with schools to reimagine classrooms, mentor teachers, and embed inclusive values into everyday practice. Together, we create safe spaces where diversity is celebrated.</p>', 1, '2025-10-15 08:42:29', '2025-10-15 08:42:29'),
(7, 'Community & Family Empowerment', 'community-family-empowerment', 'services/yHaG57D03MzdmbHn4z9aRKRJ4hUJgwyIfpxdZWqA.png', NULL, '<p><strong>Inclusion beyond the classroom.</strong><br>Through parent support groups, sibling forums, awareness campaigns, and partnerships with community leaders, we challenge stigma and build cultures of acceptance and belonging.</p><p>&nbsp;</p><p>At Acorn, we don’t just deliver services, <strong>we build relationships.</strong> Guided by knowledge, empathy, and the spirit of Ubuntu, we walk alongside learners, families, and educators to create futures filled with dignity, opportunity, and hope.</p>', 1, '2025-10-15 08:45:09', '2025-10-15 08:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('oKq2ukXlGqijMiOqqadMfS63eWMFW2WEyyCY5eiq', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibldtajhuRmx6cWZaZ0J2MDZHSEhsTHVnMzVKdHM3SDFYRzI0Wm5PRyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMTt9', 1760550488);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `shape` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `map_iframe` longtext DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `tawkto` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `url`, `logo`, `favicon`, `shape`, `email`, `mobile`, `location`, `facebook`, `instagram`, `tiktok`, `twitter`, `youtube`, `map_iframe`, `linkedin`, `tawkto`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'https://acorn.co.ke', 'settings/7gE6tS6wbXsWM8NDQ9UP7FDCDBV724RiSd0sIuRU.png', NULL, NULL, NULL, NULL, 'Muhuri Road', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-10-14 11:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `recipients` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`recipients`)),
  `status` varchar(255) NOT NULL DEFAULT 'sent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traffic`
--

CREATE TABLE `traffic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kyc_token` char(36) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'client',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kyc_token`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Caleigh Ortiz', 'carroll51@example.org', 'client', '2025-10-14 10:54:02', '$2y$12$Rfq8w8Xyko5x35SDkL/uuu8ZFxb0j.EXQIGc.l3XEZsV8vQqxjD.O', 'pCGtQn0Q1R', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(2, NULL, 'Kiara Homenick', 'sortiz@example.net', 'client', '2025-10-14 10:54:02', '$2y$12$Rfq8w8Xyko5x35SDkL/uuu8ZFxb0j.EXQIGc.l3XEZsV8vQqxjD.O', '71REDI3TcS', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(3, NULL, 'Mr. Tommie Gottlieb', 'denesik.luther@example.org', 'client', '2025-10-14 10:54:02', '$2y$12$Rfq8w8Xyko5x35SDkL/uuu8ZFxb0j.EXQIGc.l3XEZsV8vQqxjD.O', '8gxEujRIy5', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(4, NULL, 'Cristina Armstrong PhD', 'spencer.paolo@example.com', 'client', '2025-10-14 10:54:02', '$2y$12$Rfq8w8Xyko5x35SDkL/uuu8ZFxb0j.EXQIGc.l3XEZsV8vQqxjD.O', 'DWj41cJCBC', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(5, NULL, 'Angela Lockman', 'cbradtke@example.com', 'client', '2025-10-14 10:54:02', '$2y$12$Rfq8w8Xyko5x35SDkL/uuu8ZFxb0j.EXQIGc.l3XEZsV8vQqxjD.O', 'kORFLY2JpR', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(6, NULL, 'Leilani Dooley', 'rory98@example.org', 'client', '2025-10-14 10:54:02', '$2y$12$Rfq8w8Xyko5x35SDkL/uuu8ZFxb0j.EXQIGc.l3XEZsV8vQqxjD.O', '13IcOjDy0y', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(7, NULL, 'Leopold Koch PhD', 'aubree.braun@example.com', 'client', '2025-10-14 10:54:02', '$2y$12$Rfq8w8Xyko5x35SDkL/uuu8ZFxb0j.EXQIGc.l3XEZsV8vQqxjD.O', 'USFkM5Uchg', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(8, NULL, 'Michaela Aufderhar', 'emil.walsh@example.com', 'client', '2025-10-14 10:54:02', '$2y$12$Rfq8w8Xyko5x35SDkL/uuu8ZFxb0j.EXQIGc.l3XEZsV8vQqxjD.O', 'W2WwwBT7ki', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(9, NULL, 'Maiya Wunsch', 'harvey.eldridge@example.org', 'client', '2025-10-14 10:54:02', '$2y$12$Rfq8w8Xyko5x35SDkL/uuu8ZFxb0j.EXQIGc.l3XEZsV8vQqxjD.O', 'mwfAwibLvt', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(10, NULL, 'Rylan Lesch IV', 'alisha.schaefer@example.net', 'client', '2025-10-14 10:54:02', '$2y$12$Rfq8w8Xyko5x35SDkL/uuu8ZFxb0j.EXQIGc.l3XEZsV8vQqxjD.O', '0JBDTyXGJt', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(11, NULL, 'Site Admin', 'admin@acorn.co.ke', 'admin', '2025-10-14 10:54:02', '$2y$12$xr62BbXOo.li3rKtJJMyEelxlz6Yzy3z9WQWCrBaAsNAS9mAmlNi2', 'L2dV59Jd1t', '2025-10-14 10:54:02', '2025-10-14 10:54:02'),
(12, NULL, 'Stephania Schmidt III', 'ylang@example.org', 'client', '2025-10-14 12:01:17', '$2y$12$DHbWHZqVd70eLOw.ZLLGa.pzWJPxfW47PkNtcNL064LK8bC32z0bu', 'pJb75eJIF8', '2025-10-14 12:01:18', '2025-10-14 12:01:18'),
(13, NULL, 'Jennifer Spinka', 'gerald.strosin@example.org', 'client', '2025-10-14 12:01:18', '$2y$12$DHbWHZqVd70eLOw.ZLLGa.pzWJPxfW47PkNtcNL064LK8bC32z0bu', '9LbSQ1HVnN', '2025-10-14 12:01:18', '2025-10-14 12:01:18'),
(14, NULL, 'Kathryn Walker', 'phaag@example.org', 'client', '2025-10-14 12:01:18', '$2y$12$DHbWHZqVd70eLOw.ZLLGa.pzWJPxfW47PkNtcNL064LK8bC32z0bu', 'EAK75TBj6C', '2025-10-14 12:01:18', '2025-10-14 12:01:18'),
(15, NULL, 'Harvey Kub', 'dubuque.zechariah@example.org', 'client', '2025-10-14 12:01:18', '$2y$12$DHbWHZqVd70eLOw.ZLLGa.pzWJPxfW47PkNtcNL064LK8bC32z0bu', 'ZiqSpzkNvS', '2025-10-14 12:01:18', '2025-10-14 12:01:18'),
(16, NULL, 'Jennie Krajcik', 'emilia.lowe@example.net', 'client', '2025-10-14 12:01:18', '$2y$12$DHbWHZqVd70eLOw.ZLLGa.pzWJPxfW47PkNtcNL064LK8bC32z0bu', 'Um4Bx5bcD9', '2025-10-14 12:01:18', '2025-10-14 12:01:18'),
(17, NULL, 'Sheldon Koepp', 'kristina.trantow@example.com', 'client', '2025-10-14 12:01:18', '$2y$12$DHbWHZqVd70eLOw.ZLLGa.pzWJPxfW47PkNtcNL064LK8bC32z0bu', 'IgHnhJkiri', '2025-10-14 12:01:18', '2025-10-14 12:01:18'),
(18, NULL, 'Jared Shields DVM', 'burnice59@example.com', 'client', '2025-10-14 12:01:18', '$2y$12$DHbWHZqVd70eLOw.ZLLGa.pzWJPxfW47PkNtcNL064LK8bC32z0bu', 'cB6EILiIpF', '2025-10-14 12:01:18', '2025-10-14 12:01:18'),
(19, NULL, 'Willa O\'Kon MD', 'gfriesen@example.com', 'client', '2025-10-14 12:01:18', '$2y$12$DHbWHZqVd70eLOw.ZLLGa.pzWJPxfW47PkNtcNL064LK8bC32z0bu', 't2bHSSknAF', '2025-10-14 12:01:18', '2025-10-14 12:01:18'),
(20, NULL, 'Miss Angie Breitenberg', 'forrest.anderson@example.org', 'client', '2025-10-14 12:01:18', '$2y$12$DHbWHZqVd70eLOw.ZLLGa.pzWJPxfW47PkNtcNL064LK8bC32z0bu', 'wPrMiJt3Hb', '2025-10-14 12:01:18', '2025-10-14 12:01:18'),
(21, NULL, 'Israel Hammes', 'xnikolaus@example.org', 'client', '2025-10-14 12:01:18', '$2y$12$DHbWHZqVd70eLOw.ZLLGa.pzWJPxfW47PkNtcNL064LK8bC32z0bu', 'DhKyPyiAXo', '2025-10-14 12:01:18', '2025-10-14 12:01:18'),
(23, NULL, 'Dr. Jeremy Rowe IV', 'delta.sawayn@example.com', 'client', '2025-10-14 12:01:52', '$2y$12$H2Kwr0Xl.TCVkXcc9lZbI.OeBqKzC7eeMqrsw9ZR5.QU5sbIvu2IK', 'wKvMrsdGla', '2025-10-14 12:01:53', '2025-10-14 12:01:53'),
(24, NULL, 'Isai Runolfsson', 'xmante@example.net', 'client', '2025-10-14 12:01:53', '$2y$12$H2Kwr0Xl.TCVkXcc9lZbI.OeBqKzC7eeMqrsw9ZR5.QU5sbIvu2IK', 'FCM1ENjPkN', '2025-10-14 12:01:53', '2025-10-14 12:01:53'),
(25, NULL, 'Trisha Wuckert', 'belle70@example.net', 'client', '2025-10-14 12:01:53', '$2y$12$H2Kwr0Xl.TCVkXcc9lZbI.OeBqKzC7eeMqrsw9ZR5.QU5sbIvu2IK', 'ohgly7Bxkg', '2025-10-14 12:01:53', '2025-10-14 12:01:53'),
(26, NULL, 'Ernest Strosin', 'cchristiansen@example.net', 'client', '2025-10-14 12:01:53', '$2y$12$H2Kwr0Xl.TCVkXcc9lZbI.OeBqKzC7eeMqrsw9ZR5.QU5sbIvu2IK', 'LMfauJMsVy', '2025-10-14 12:01:53', '2025-10-14 12:01:53'),
(27, NULL, 'Mr. Rowan Hilpert', 'gustave52@example.com', 'client', '2025-10-14 12:01:53', '$2y$12$H2Kwr0Xl.TCVkXcc9lZbI.OeBqKzC7eeMqrsw9ZR5.QU5sbIvu2IK', 'rpJFdCqh7a', '2025-10-14 12:01:53', '2025-10-14 12:01:53'),
(28, NULL, 'Meghan Runolfsson', 'yconsidine@example.com', 'client', '2025-10-14 12:01:53', '$2y$12$H2Kwr0Xl.TCVkXcc9lZbI.OeBqKzC7eeMqrsw9ZR5.QU5sbIvu2IK', 'JC2Ok0HH1O', '2025-10-14 12:01:53', '2025-10-14 12:01:53'),
(29, NULL, 'Devan Leffler', 'arlene.blick@example.net', 'client', '2025-10-14 12:01:53', '$2y$12$H2Kwr0Xl.TCVkXcc9lZbI.OeBqKzC7eeMqrsw9ZR5.QU5sbIvu2IK', 'lA5w4rqj9V', '2025-10-14 12:01:53', '2025-10-14 12:01:53'),
(30, NULL, 'Joyce Klocko', 'denesik.jerel@example.net', 'client', '2025-10-14 12:01:53', '$2y$12$H2Kwr0Xl.TCVkXcc9lZbI.OeBqKzC7eeMqrsw9ZR5.QU5sbIvu2IK', 'KHN4QkwpD3', '2025-10-14 12:01:53', '2025-10-14 12:01:53'),
(31, NULL, 'Stuart Langworth', 'kraig81@example.com', 'client', '2025-10-14 12:01:53', '$2y$12$H2Kwr0Xl.TCVkXcc9lZbI.OeBqKzC7eeMqrsw9ZR5.QU5sbIvu2IK', 'l0nxTvWkOE', '2025-10-14 12:01:53', '2025-10-14 12:01:53'),
(32, NULL, 'Una Kiehn Jr.', 'mmante@example.com', 'client', '2025-10-14 12:01:53', '$2y$12$H2Kwr0Xl.TCVkXcc9lZbI.OeBqKzC7eeMqrsw9ZR5.QU5sbIvu2IK', 'zhNgWXOmKF', '2025-10-14 12:01:53', '2025-10-14 12:01:53'),
(33, NULL, 'Consultant One', 'consultant1@example.com', 'consultant', NULL, '$2y$12$GgV6Sca5SrkuPdMcJORsDe3OuY7yZYj5kQiY6PPJULj3gE8xDoGnG', NULL, '2025-10-14 12:01:54', '2025-10-14 12:01:54'),
(34, NULL, 'Consultant Two', 'consultant2@example.com', 'consultant', NULL, '$2y$12$6SlRYf6oAc8pRBZlp1hgceKpIEPoGQ52N6J7BnAB/3Tx2ZHGyntfu', NULL, '2025-10-14 12:01:54', '2025-10-14 12:01:54'),
(35, NULL, 'Chaz Bartoletti', 'watsica.laney@example.org', 'client', '2025-10-14 14:05:12', '$2y$12$zHfG4iZxAJFCmBsOxW9GOehjBLUpnwxErtjcALTICU/g3VYJNr73W', '4FJaD9XVpi', '2025-10-14 14:05:12', '2025-10-14 14:05:12'),
(36, NULL, 'Miss Maci O\'Keefe', 'blittel@example.org', 'client', '2025-10-14 14:05:12', '$2y$12$zHfG4iZxAJFCmBsOxW9GOehjBLUpnwxErtjcALTICU/g3VYJNr73W', 'mQCU0xxBTj', '2025-10-14 14:05:12', '2025-10-14 14:05:12'),
(37, NULL, 'Mrs. Mae Hodkiewicz Sr.', 'dovie14@example.org', 'client', '2025-10-14 14:05:12', '$2y$12$zHfG4iZxAJFCmBsOxW9GOehjBLUpnwxErtjcALTICU/g3VYJNr73W', '6KgerYy6fA', '2025-10-14 14:05:12', '2025-10-14 14:05:12'),
(38, NULL, 'Bernadine Ferry', 'glueilwitz@example.org', 'client', '2025-10-14 14:05:12', '$2y$12$zHfG4iZxAJFCmBsOxW9GOehjBLUpnwxErtjcALTICU/g3VYJNr73W', 'T31yx7wydO', '2025-10-14 14:05:12', '2025-10-14 14:05:12'),
(39, NULL, 'Antonina Weimann', 'wiegand.hildegard@example.com', 'client', '2025-10-14 14:05:12', '$2y$12$zHfG4iZxAJFCmBsOxW9GOehjBLUpnwxErtjcALTICU/g3VYJNr73W', 'wkxlVMZW9z', '2025-10-14 14:05:12', '2025-10-14 14:05:12'),
(40, NULL, 'Marlen Wuckert', 'rosa.orn@example.com', 'client', '2025-10-14 14:05:12', '$2y$12$zHfG4iZxAJFCmBsOxW9GOehjBLUpnwxErtjcALTICU/g3VYJNr73W', 'LY07GoUqPf', '2025-10-14 14:05:12', '2025-10-14 14:05:12'),
(41, NULL, 'Adalberto Dach', 'cullrich@example.org', 'client', '2025-10-14 14:05:12', '$2y$12$zHfG4iZxAJFCmBsOxW9GOehjBLUpnwxErtjcALTICU/g3VYJNr73W', '2api8h4zb8', '2025-10-14 14:05:12', '2025-10-14 14:05:12'),
(42, NULL, 'Prof. Ralph Koepp V', 'savion29@example.org', 'client', '2025-10-14 14:05:12', '$2y$12$zHfG4iZxAJFCmBsOxW9GOehjBLUpnwxErtjcALTICU/g3VYJNr73W', 'DIL1qhwB4b', '2025-10-14 14:05:12', '2025-10-14 14:05:12'),
(43, NULL, 'Mossie Feeney', 'luettgen.concepcion@example.org', 'client', '2025-10-14 14:05:12', '$2y$12$zHfG4iZxAJFCmBsOxW9GOehjBLUpnwxErtjcALTICU/g3VYJNr73W', 'hpS3siDqiK', '2025-10-14 14:05:12', '2025-10-14 14:05:12'),
(44, NULL, 'Arianna Hessel', 'amos.halvorson@example.net', 'client', '2025-10-14 14:05:12', '$2y$12$zHfG4iZxAJFCmBsOxW9GOehjBLUpnwxErtjcALTICU/g3VYJNr73W', 'Cyk818oRr5', '2025-10-14 14:05:12', '2025-10-14 14:05:12'),
(45, NULL, 'Bradley Wilderman', 'cary.ratke@example.net', 'client', '2025-10-14 14:05:28', '$2y$12$HxA3AmAqM5VipIXZ.rVGH.sY1rK5hOtajNhsYrnACGqPvuGxzANgu', 'TDdgdNJ3hW', '2025-10-14 14:05:28', '2025-10-14 14:05:28'),
(46, NULL, 'Mrs. Pinkie Lesch Sr.', 'stephania.labadie@example.com', 'client', '2025-10-14 14:05:28', '$2y$12$HxA3AmAqM5VipIXZ.rVGH.sY1rK5hOtajNhsYrnACGqPvuGxzANgu', '5KjwI1rjFP', '2025-10-14 14:05:28', '2025-10-14 14:05:28'),
(47, NULL, 'Blanche Moore IV', 'mayer.derek@example.org', 'client', '2025-10-14 14:05:28', '$2y$12$HxA3AmAqM5VipIXZ.rVGH.sY1rK5hOtajNhsYrnACGqPvuGxzANgu', 'Y2TwfmBaEJ', '2025-10-14 14:05:28', '2025-10-14 14:05:28'),
(48, NULL, 'Brant Kris IV', 'boyle.elijah@example.com', 'client', '2025-10-14 14:05:28', '$2y$12$HxA3AmAqM5VipIXZ.rVGH.sY1rK5hOtajNhsYrnACGqPvuGxzANgu', '3X2DX4PNno', '2025-10-14 14:05:28', '2025-10-14 14:05:28'),
(49, NULL, 'Miss Nyah Thompson Jr.', 'lamont13@example.org', 'client', '2025-10-14 14:05:28', '$2y$12$HxA3AmAqM5VipIXZ.rVGH.sY1rK5hOtajNhsYrnACGqPvuGxzANgu', 'T2Rh3rsRJd', '2025-10-14 14:05:28', '2025-10-14 14:05:28'),
(50, NULL, 'Lance Stehr', 'xmoen@example.net', 'client', '2025-10-14 14:05:28', '$2y$12$HxA3AmAqM5VipIXZ.rVGH.sY1rK5hOtajNhsYrnACGqPvuGxzANgu', 'zPaNL1EiQN', '2025-10-14 14:05:28', '2025-10-14 14:05:28'),
(51, NULL, 'Dr. Rosetta Morissette', 'hunter46@example.org', 'client', '2025-10-14 14:05:28', '$2y$12$HxA3AmAqM5VipIXZ.rVGH.sY1rK5hOtajNhsYrnACGqPvuGxzANgu', 'ZPwjBFR3TR', '2025-10-14 14:05:28', '2025-10-14 14:05:28'),
(52, NULL, 'Mr. Edd Lockman PhD', 'mpaucek@example.org', 'client', '2025-10-14 14:05:28', '$2y$12$HxA3AmAqM5VipIXZ.rVGH.sY1rK5hOtajNhsYrnACGqPvuGxzANgu', '46W9XGWx8q', '2025-10-14 14:05:28', '2025-10-14 14:05:28'),
(53, NULL, 'Cassandra Mayer', 'roy.huel@example.net', 'client', '2025-10-14 14:05:28', '$2y$12$HxA3AmAqM5VipIXZ.rVGH.sY1rK5hOtajNhsYrnACGqPvuGxzANgu', 'SgHIG1wELV', '2025-10-14 14:05:28', '2025-10-14 14:05:28'),
(54, NULL, 'Prof. Roma Osinski V', 'eden.mohr@example.net', 'client', '2025-10-14 14:05:28', '$2y$12$HxA3AmAqM5VipIXZ.rVGH.sY1rK5hOtajNhsYrnACGqPvuGxzANgu', 'NKs9aAPERq', '2025-10-14 14:05:28', '2025-10-14 14:05:28'),
(55, NULL, 'Brooks Gutmann Sr.', 'shields.dessie@example.org', 'client', '2025-10-14 14:06:40', '$2y$12$nRhl7bEsZAcsh7PCdQfsm.68wEMa0cID14CIqYd8tnr/LEN80np82', '4kien6OiZX', '2025-10-14 14:06:41', '2025-10-14 14:06:41'),
(56, NULL, 'Michel Koepp', 'jtoy@example.com', 'client', '2025-10-14 14:06:41', '$2y$12$nRhl7bEsZAcsh7PCdQfsm.68wEMa0cID14CIqYd8tnr/LEN80np82', 'DzBQF3Diyd', '2025-10-14 14:06:41', '2025-10-14 14:06:41'),
(57, NULL, 'Miss Daphnee Jacobi', 'xschaden@example.com', 'client', '2025-10-14 14:06:41', '$2y$12$nRhl7bEsZAcsh7PCdQfsm.68wEMa0cID14CIqYd8tnr/LEN80np82', 'qbNdbJlk4n', '2025-10-14 14:06:41', '2025-10-14 14:06:41'),
(58, NULL, 'Viviane Schinner', 'graciela.durgan@example.net', 'client', '2025-10-14 14:06:41', '$2y$12$nRhl7bEsZAcsh7PCdQfsm.68wEMa0cID14CIqYd8tnr/LEN80np82', '1tDj48a05d', '2025-10-14 14:06:41', '2025-10-14 14:06:41'),
(59, NULL, 'Dr. Marianne Ruecker', 'aufderhar.macey@example.com', 'client', '2025-10-14 14:06:41', '$2y$12$nRhl7bEsZAcsh7PCdQfsm.68wEMa0cID14CIqYd8tnr/LEN80np82', 'bkI2LLZwIe', '2025-10-14 14:06:41', '2025-10-14 14:06:41'),
(60, NULL, 'Miss Jade Ritchie', 'delaney13@example.org', 'client', '2025-10-14 14:06:41', '$2y$12$nRhl7bEsZAcsh7PCdQfsm.68wEMa0cID14CIqYd8tnr/LEN80np82', 'DKnLk80Kde', '2025-10-14 14:06:41', '2025-10-14 14:06:41'),
(61, NULL, 'Quinten Greenfelder', 'kaelyn62@example.org', 'client', '2025-10-14 14:06:41', '$2y$12$nRhl7bEsZAcsh7PCdQfsm.68wEMa0cID14CIqYd8tnr/LEN80np82', 'jiWrFx9A81', '2025-10-14 14:06:41', '2025-10-14 14:06:41'),
(62, NULL, 'Demarco Rogahn', 'rcronin@example.net', 'client', '2025-10-14 14:06:41', '$2y$12$nRhl7bEsZAcsh7PCdQfsm.68wEMa0cID14CIqYd8tnr/LEN80np82', 'I8SDQyBNcK', '2025-10-14 14:06:41', '2025-10-14 14:06:41'),
(63, NULL, 'Dr. Luz Koss', 'eleazar01@example.com', 'client', '2025-10-14 14:06:41', '$2y$12$nRhl7bEsZAcsh7PCdQfsm.68wEMa0cID14CIqYd8tnr/LEN80np82', '0cchDlybvE', '2025-10-14 14:06:41', '2025-10-14 14:06:41'),
(64, NULL, 'Maurine Schneider', 'freeman.swaniawski@example.net', 'client', '2025-10-14 14:06:41', '$2y$12$nRhl7bEsZAcsh7PCdQfsm.68wEMa0cID14CIqYd8tnr/LEN80np82', 'CosaA9pwjM', '2025-10-14 14:06:41', '2025-10-14 14:06:41'),
(65, NULL, 'Robyn Botsford', 'jazmin94@example.org', 'client', '2025-10-14 14:23:20', '$2y$12$yL84cQ7wn3S6lgW627Tlee/OXhbkRs.GC5QR6yEaSzqkrk8pdPVWS', 'KzH8iW1k88', '2025-10-14 14:23:21', '2025-10-14 14:23:21'),
(66, NULL, 'Verona Casper DDS', 'jaylon83@example.net', 'client', '2025-10-14 14:23:21', '$2y$12$yL84cQ7wn3S6lgW627Tlee/OXhbkRs.GC5QR6yEaSzqkrk8pdPVWS', 'eyuMQKBJMj', '2025-10-14 14:23:21', '2025-10-14 14:23:21'),
(67, NULL, 'Carmela Kling', 'zlynch@example.com', 'client', '2025-10-14 14:23:21', '$2y$12$yL84cQ7wn3S6lgW627Tlee/OXhbkRs.GC5QR6yEaSzqkrk8pdPVWS', 'mHxT1wXrxf', '2025-10-14 14:23:21', '2025-10-14 14:23:21'),
(68, NULL, 'Berenice Boyle', 'ogaylord@example.com', 'client', '2025-10-14 14:23:21', '$2y$12$yL84cQ7wn3S6lgW627Tlee/OXhbkRs.GC5QR6yEaSzqkrk8pdPVWS', 'JbDSOc0ZVW', '2025-10-14 14:23:21', '2025-10-14 14:23:21'),
(69, NULL, 'Dr. Luis Maggio II', 'ischaefer@example.org', 'client', '2025-10-14 14:23:21', '$2y$12$yL84cQ7wn3S6lgW627Tlee/OXhbkRs.GC5QR6yEaSzqkrk8pdPVWS', 'E9DXqf0kG0', '2025-10-14 14:23:21', '2025-10-14 14:23:21'),
(70, NULL, 'Michale Emmerich', 'wilderman.regan@example.org', 'client', '2025-10-14 14:23:21', '$2y$12$yL84cQ7wn3S6lgW627Tlee/OXhbkRs.GC5QR6yEaSzqkrk8pdPVWS', '6LcJHCmaKu', '2025-10-14 14:23:21', '2025-10-14 14:23:21'),
(71, NULL, 'Eulah Wilkinson', 'turner.laisha@example.org', 'client', '2025-10-14 14:23:21', '$2y$12$yL84cQ7wn3S6lgW627Tlee/OXhbkRs.GC5QR6yEaSzqkrk8pdPVWS', 'N7XzTtpo34', '2025-10-14 14:23:21', '2025-10-14 14:23:21'),
(72, NULL, 'Ms. Jessika Cole', 'helena.gaylord@example.org', 'client', '2025-10-14 14:23:21', '$2y$12$yL84cQ7wn3S6lgW627Tlee/OXhbkRs.GC5QR6yEaSzqkrk8pdPVWS', 'UfuPGnd4J2', '2025-10-14 14:23:21', '2025-10-14 14:23:21'),
(73, NULL, 'Ari McCullough', 'carlotta38@example.net', 'client', '2025-10-14 14:23:21', '$2y$12$yL84cQ7wn3S6lgW627Tlee/OXhbkRs.GC5QR6yEaSzqkrk8pdPVWS', 'ztT3sKEcjB', '2025-10-14 14:23:21', '2025-10-14 14:23:21'),
(74, NULL, 'Shirley Bosco', 'larissa.farrell@example.net', 'client', '2025-10-14 14:23:21', '$2y$12$yL84cQ7wn3S6lgW627Tlee/OXhbkRs.GC5QR6yEaSzqkrk8pdPVWS', 'XOhFaGO0Ci', '2025-10-14 14:23:21', '2025-10-14 14:23:21'),
(75, NULL, 'Elliot Carter DDS', 'alvina.kuhlman@example.com', 'client', '2025-10-14 14:25:26', '$2y$12$Tpb7sYVzabJRRv.FeU4BV.sc06xrHPnqlDU97Or9FPTb7kP7KzVYa', 'GoIJ8La9Qc', '2025-10-14 14:25:27', '2025-10-14 14:25:27'),
(76, NULL, 'Floy Lynch', 'tristian.weber@example.com', 'client', '2025-10-14 14:25:27', '$2y$12$Tpb7sYVzabJRRv.FeU4BV.sc06xrHPnqlDU97Or9FPTb7kP7KzVYa', 'bxxvHU75tO', '2025-10-14 14:25:27', '2025-10-14 14:25:27'),
(77, NULL, 'Jasmin Bogan', 'zgerlach@example.org', 'client', '2025-10-14 14:25:27', '$2y$12$Tpb7sYVzabJRRv.FeU4BV.sc06xrHPnqlDU97Or9FPTb7kP7KzVYa', 'cshSf8LqiY', '2025-10-14 14:25:27', '2025-10-14 14:25:27'),
(78, NULL, 'Heber Sanford IV', 'jaskolski.carlee@example.net', 'client', '2025-10-14 14:25:27', '$2y$12$Tpb7sYVzabJRRv.FeU4BV.sc06xrHPnqlDU97Or9FPTb7kP7KzVYa', '1lQOyZPqlW', '2025-10-14 14:25:27', '2025-10-14 14:25:27'),
(79, NULL, 'Dr. Kristin Harvey', 'delbert.smith@example.net', 'client', '2025-10-14 14:25:27', '$2y$12$Tpb7sYVzabJRRv.FeU4BV.sc06xrHPnqlDU97Or9FPTb7kP7KzVYa', 'SLKJWX2oxI', '2025-10-14 14:25:27', '2025-10-14 14:25:27'),
(80, NULL, 'Trevion Beatty', 'alvah.goodwin@example.net', 'client', '2025-10-14 14:25:27', '$2y$12$Tpb7sYVzabJRRv.FeU4BV.sc06xrHPnqlDU97Or9FPTb7kP7KzVYa', 'FgAT8WgKes', '2025-10-14 14:25:27', '2025-10-14 14:25:27'),
(81, NULL, 'Adaline Abernathy', 'bblick@example.net', 'client', '2025-10-14 14:25:27', '$2y$12$Tpb7sYVzabJRRv.FeU4BV.sc06xrHPnqlDU97Or9FPTb7kP7KzVYa', 'WFqQAvUY8R', '2025-10-14 14:25:27', '2025-10-14 14:25:27'),
(82, NULL, 'Gaylord Erdman', 'julia59@example.org', 'client', '2025-10-14 14:25:27', '$2y$12$Tpb7sYVzabJRRv.FeU4BV.sc06xrHPnqlDU97Or9FPTb7kP7KzVYa', 'n5Gdn7ZVTb', '2025-10-14 14:25:27', '2025-10-14 14:25:27'),
(83, NULL, 'Mr. Freddie Streich', 'harvey.brad@example.com', 'client', '2025-10-14 14:25:27', '$2y$12$Tpb7sYVzabJRRv.FeU4BV.sc06xrHPnqlDU97Or9FPTb7kP7KzVYa', '7LlOC0bIrH', '2025-10-14 14:25:27', '2025-10-14 14:25:27'),
(84, NULL, 'Dr. Katlynn Kuhn DDS', 'rquitzon@example.org', 'client', '2025-10-14 14:25:27', '$2y$12$Tpb7sYVzabJRRv.FeU4BV.sc06xrHPnqlDU97Or9FPTb7kP7KzVYa', 'em5pyhX8wK', '2025-10-14 14:25:27', '2025-10-14 14:25:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_consultant_id_foreign` (`consultant_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_kyc_token_unique` (`kyc_token`);

--
-- Indexes for table `core_values`
--
ALTER TABLE `core_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `founders`
--
ALTER TABLE `founders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`),
  ADD KEY `invoices_appointment_id_foreign` (`appointment_id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`),
  ADD KEY `invoices_consultant_id_foreign` (`consultant_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_submissions`
--
ALTER TABLE `kyc_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legals`
--
ALTER TABLE `legals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa_c2b_payments`
--
ALTER TABLE `mpesa_c2b_payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mpesa_c2b_payments_trans_id_unique` (`trans_id`);

--
-- Indexes for table `mpesa_stk_payments`
--
ALTER TABLE `mpesa_stk_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mpesa_stk_payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `purposes`
--
ALTER TABLE `purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `traffic`
--
ALTER TABLE `traffic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_kyc_token_unique` (`kyc_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_values`
--
ALTER TABLE `core_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `founders`
--
ALTER TABLE `founders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kyc_submissions`
--
ALTER TABLE `kyc_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `legals`
--
ALTER TABLE `legals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `mpesa_c2b_payments`
--
ALTER TABLE `mpesa_c2b_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mpesa_stk_payments`
--
ALTER TABLE `mpesa_stk_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purposes`
--
ALTER TABLE `purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `traffic`
--
ALTER TABLE `traffic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `mpesa_stk_payments`
--
ALTER TABLE `mpesa_stk_payments`
  ADD CONSTRAINT `mpesa_stk_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
