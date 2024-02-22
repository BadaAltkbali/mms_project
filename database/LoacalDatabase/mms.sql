-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 فبراير 2024 الساعة 10:40
-- إصدار الخادم: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- بنية الجدول `adjective_employees`
--

CREATE TABLE `adjective_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `AdjName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `adjective_employees`
--

INSERT INTO `adjective_employees` (`id`, `AdjName`, `created_at`, `updated_at`) VALUES
(1, 'اختر', NULL, NULL),
(2, 'مدير عام', '2023-12-21 06:01:15', '2023-12-21 06:01:15'),
(3, 'فني اشعه', '2023-12-21 06:01:22', '2023-12-21 06:01:22');

-- --------------------------------------------------------

--
-- بنية الجدول `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `BankName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `banks`
--

INSERT INTO `banks` (`id`, `BankName`, `created_at`, `updated_at`) VALUES
(1, 'اختر', NULL, NULL),
(2, 'مصرف الجمهوريه', '2023-12-21 06:00:58', '2023-12-21 06:00:58');

-- --------------------------------------------------------

--
-- بنية الجدول `bank_branches`
--

CREATE TABLE `bank_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `BranchName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `bank_branches`
--

INSERT INTO `bank_branches` (`id`, `BranchName`, `created_at`, `updated_at`) VALUES
(1, 'اختر', NULL, NULL),
(2, 'شارع الصريم', '2023-12-21 06:01:05', '2023-12-21 06:01:05');

-- --------------------------------------------------------

--
-- بنية الجدول `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fileNumber` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `adjective_id` bigint(20) UNSIGNED NOT NULL,
  `national_no` varchar(255) DEFAULT NULL,
  `birth_d` varchar(255) DEFAULT NULL,
  `place_birth` varchar(255) DEFAULT NULL,
  `place_residence` varchar(255) DEFAULT NULL,
  `closest_point` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `blood_t` varchar(255) DEFAULT NULL,
  `phone_n` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `sons` int(11) DEFAULT NULL,
  `daughter` int(11) DEFAULT NULL,
  `closest_relatives` varchar(255) DEFAULT NULL,
  `closest_relatives_Phone` varchar(255) DEFAULT NULL,
  `passport_or_card` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `passport_releaseDate` varchar(255) DEFAULT NULL,
  `passport_placeOfissue` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `id_card_releaseDate` varchar(255) DEFAULT NULL,
  `id_card_placeOfissue` varchar(255) DEFAULT NULL,
  `familyHandbook_No` varchar(255) DEFAULT NULL,
  `familyRegistration_No` varchar(255) DEFAULT NULL,
  `familyPaper_No` varchar(255) DEFAULT NULL,
  `familyHandbook_No___releaseDate` varchar(255) DEFAULT NULL,
  `familyHandbook_No___placeOfissue` varchar(255) DEFAULT NULL,
  `financial_Figure` varchar(255) NOT NULL,
  `bankName_id` bigint(20) UNSIGNED NOT NULL,
  `bankBranch_id` bigint(20) UNSIGNED NOT NULL,
  `bank_accountNo` varchar(255) DEFAULT NULL,
  `unitName` varchar(255) DEFAULT NULL,
  `unitBranch_id` bigint(20) UNSIGNED NOT NULL,
  `classificationEmpContract` varchar(255) DEFAULT NULL,
  `hiringDate` varchar(255) DEFAULT NULL,
  `startJopDate` varchar(255) DEFAULT NULL,
  `appointment_decision` varchar(255) DEFAULT NULL,
  `Contract_registrationNo` varchar(255) DEFAULT NULL,
  `lastPromotion` varchar(255) DEFAULT NULL,
  `current_grade` varchar(255) DEFAULT NULL,
  `current_grade_date` varchar(255) DEFAULT NULL,
  `courses_obtained` varchar(255) DEFAULT NULL,
  `diseases` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `vacations` varchar(255) DEFAULT NULL,
  `medical_comfort` varchar(255) DEFAULT NULL,
  `altasweat` varchar(255) DEFAULT NULL,
  `placement` varchar(255) DEFAULT NULL,
  `graduationDate` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `graduationPlace` varchar(255) DEFAULT NULL,
  `workplace` varchar(255) DEFAULT NULL,
  `stopping` varchar(255) DEFAULT NULL,
  `fleeing` varchar(255) DEFAULT NULL,
  `retired` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `employees`
--

INSERT INTO `employees` (`id`, `fileNumber`, `full_name`, `adjective_id`, `national_no`, `birth_d`, `place_birth`, `place_residence`, `closest_point`, `nationality`, `religion`, `blood_t`, `phone_n`, `marital_status`, `sons`, `daughter`, `closest_relatives`, `closest_relatives_Phone`, `passport_or_card`, `passport`, `passport_releaseDate`, `passport_placeOfissue`, `id_card`, `id_card_releaseDate`, `id_card_placeOfissue`, `familyHandbook_No`, `familyRegistration_No`, `familyPaper_No`, `familyHandbook_No___releaseDate`, `familyHandbook_No___placeOfissue`, `financial_Figure`, `bankName_id`, `bankBranch_id`, `bank_accountNo`, `unitName`, `unitBranch_id`, `classificationEmpContract`, `hiringDate`, `startJopDate`, `appointment_decision`, `Contract_registrationNo`, `lastPromotion`, `current_grade`, `current_grade_date`, `courses_obtained`, `diseases`, `notes`, `vacations`, `medical_comfort`, `altasweat`, `placement`, `graduationDate`, `qualification`, `specialization`, `graduationPlace`, `workplace`, `stopping`, `fleeing`, `retired`, `created_at`, `updated_at`) VALUES
(1, NULL, 'mawada', 2, '534535', NULL, NULL, NULL, NULL, NULL, NULL, '/', NULL, '/', NULL, NULL, NULL, NULL, '/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '78575', 1, 1, '53453', NULL, 2, '/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'تقنيه المعلومات', NULL, '/', NULL, NULL, NULL, 'on', 'off', 'off', '2024-01-03 07:36:18', '2024-01-03 07:36:18');

-- --------------------------------------------------------

--
-- بنية الجدول `employees_officers`
--

CREATE TABLE `employees_officers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fileNumber` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `national_no` varchar(255) DEFAULT NULL,
  `birth_d` varchar(255) DEFAULT NULL,
  `place_birth` varchar(255) DEFAULT NULL,
  `place_residence` varchar(255) DEFAULT NULL,
  `closest_point` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `blood_t` varchar(255) DEFAULT NULL,
  `phone_n` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `sons` int(11) DEFAULT NULL,
  `daughter` int(11) DEFAULT NULL,
  `closest_relatives` varchar(255) DEFAULT NULL,
  `closest_relatives_Phone` varchar(255) DEFAULT NULL,
  `passport_or_card` varchar(255) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `passport_releaseDate` varchar(255) DEFAULT NULL,
  `passport_placeOfissue` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `id_card_releaseDate` varchar(255) DEFAULT NULL,
  `id_card_placeOfissue` varchar(255) DEFAULT NULL,
  `familyHandbook_No` varchar(255) DEFAULT NULL,
  `familyRegistration_No` varchar(255) DEFAULT NULL,
  `familyPaper_No` varchar(255) DEFAULT NULL,
  `familyHandbook_No___releaseDate` varchar(255) DEFAULT NULL,
  `familyHandbook_No___placeOfissue` varchar(255) DEFAULT NULL,
  `military_number` varchar(255) DEFAULT NULL,
  `Rank` varchar(255) DEFAULT NULL,
  `bankName_id` varchar(255) DEFAULT NULL,
  `bankBranch_id` varchar(255) DEFAULT NULL,
  `bank_accountNo` varchar(255) DEFAULT NULL,
  `unitName` varchar(255) DEFAULT NULL,
  `unitBranch_id` varchar(255) DEFAULT NULL,
  `classificationEmpContract` varchar(255) DEFAULT NULL,
  `hiringDate` varchar(255) DEFAULT NULL,
  `startJopDate` varchar(255) DEFAULT NULL,
  `appointment_decision` varchar(255) DEFAULT NULL,
  `Contract_registrationNo` varchar(255) DEFAULT NULL,
  `lastPromotion` varchar(255) DEFAULT NULL,
  `current_grade` varchar(255) DEFAULT NULL,
  `current_grade_date` varchar(255) DEFAULT NULL,
  `courses_obtained` varchar(255) DEFAULT NULL,
  `diseases` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `vacations` varchar(255) DEFAULT NULL,
  `medical_comfort` varchar(255) DEFAULT NULL,
  `altasweat` varchar(255) DEFAULT NULL,
  `placement` varchar(255) DEFAULT NULL,
  `graduationDate` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `graduationPlace` varchar(255) DEFAULT NULL,
  `workplace` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `employees_officers`
--

INSERT INTO `employees_officers` (`id`, `fileNumber`, `full_name`, `national_no`, `birth_d`, `place_birth`, `place_residence`, `closest_point`, `nationality`, `religion`, `blood_t`, `phone_n`, `marital_status`, `sons`, `daughter`, `closest_relatives`, `closest_relatives_Phone`, `passport_or_card`, `passport`, `passport_releaseDate`, `passport_placeOfissue`, `id_card`, `id_card_releaseDate`, `id_card_placeOfissue`, `familyHandbook_No`, `familyRegistration_No`, `familyPaper_No`, `familyHandbook_No___releaseDate`, `familyHandbook_No___placeOfissue`, `military_number`, `Rank`, `bankName_id`, `bankBranch_id`, `bank_accountNo`, `unitName`, `unitBranch_id`, `classificationEmpContract`, `hiringDate`, `startJopDate`, `appointment_decision`, `Contract_registrationNo`, `lastPromotion`, `current_grade`, `current_grade_date`, `courses_obtained`, `diseases`, `notes`, `vacations`, `medical_comfort`, `altasweat`, `placement`, `graduationDate`, `qualification`, `specialization`, `graduationPlace`, `workplace`, `created_at`, `updated_at`) VALUES
(1, NULL, 'ahmed', '8687578', NULL, NULL, NULL, NULL, NULL, NULL, '/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '87686', 'ملازم أول', 'الوحدة', NULL, '876876', NULL, '/', '/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/', NULL, NULL, NULL, '2024-01-03 07:36:34', '2024-01-03 07:36:34'),
(2, NULL, 'mawadammm', '8767867', NULL, NULL, NULL, NULL, NULL, NULL, '/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7867868', 'رائد', '/', NULL, '78686', NULL, '/', '/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/', NULL, NULL, NULL, '2024-01-03 07:36:49', '2024-01-03 07:36:49');

-- --------------------------------------------------------

--
-- بنية الجدول `emp_datas`
--

CREATE TABLE `emp_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `nationalNo` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `bank_no` varchar(255) DEFAULT NULL,
  `wehda` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_09_120649_create_adjective_employees_table', 1),
(6, '2023_07_027_000003_create_bank_branches_table', 1),
(7, '2023_07_27_000002_create_banks_table', 1),
(8, '2023_07_27_000004_create_unit_branches_table', 1),
(9, '2023_07_27_144532_create_employees_table', 1),
(10, '2023_08_28_122701_create_employees_officers_table', 1),
(11, '2023_09_12_095404_create_permission_tables', 1),
(12, '2023_09_13_175610_create_emp_datas_table', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2023-12-09 15:17:29', '2023-12-09 15:17:29'),
(2, 'role-create', 'web', '2023-12-09 15:17:29', '2023-12-09 15:17:29'),
(3, 'role-edit', 'web', '2023-12-09 15:17:29', '2023-12-09 15:17:29'),
(4, 'role-delete', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(5, 'emp-all', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(6, 'emp-list', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(7, 'emp-create', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(8, 'emp-update', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(9, 'emp-delete', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(10, 'emp-show', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(11, 'empOffice-all', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(12, 'empOffice-list', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(13, 'empOffice-create', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(14, 'empOffice-update', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(15, 'empOffice-delete', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(16, 'empOffice-show', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(17, 'Personal-emp-all', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(18, 'Personal-empOffice-all', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(19, 'Personal-emp-list', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(20, 'Personal-empOffice-list', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(21, 'Personal-emp-update', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(22, 'Personal-empOffice-update', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(23, 'Personal-emp-show', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(24, 'Personal-empOffice-show', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(25, 'users-all', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(26, 'users-list', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(27, 'users-create', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(28, 'users-update', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(29, 'users-delete', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(30, 'users-show', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(31, 'filter-all', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(32, 'filter-emp', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(33, 'filter-empOffice', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(34, 'filter-emp_Print', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(35, 'filter-empOffice_Print', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(36, 'Dashboard_widget', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(37, 'mainInfo-all', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(38, 'mainInfo-wahadat', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(39, 'mainInfo-banks', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(40, 'mainInfo-adjectives', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30'),
(41, 'subList-all', 'web', '2023-12-09 15:17:30', '2023-12-09 15:17:30');

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-12-09 15:18:23', '2023-12-09 15:18:23'),
(2, 'users', 'web', '2024-01-03 07:35:21', '2024-01-03 07:35:21');

-- --------------------------------------------------------

--
-- بنية الجدول `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `unit_branches`
--

CREATE TABLE `unit_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unitBranch_Name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `unit_branches`
--

INSERT INTO `unit_branches` (`id`, `unitBranch_Name`, `created_at`, `updated_at`) VALUES
(1, 'اختر', NULL, NULL),
(2, 'الخدمات الطبيه العسكريه / طرابلس', '2023-12-21 06:01:36', '2023-12-21 06:01:36');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mmsAdmin', 'Supper Admin', '$2y$10$bBz6ScHOoMJZseOhC.t/MO.KuGaFPJLlh/qqfQuqq3mYrcw7Udcj.', NULL, '2023-12-09 15:18:23', '2023-12-09 15:18:23'),
(2, 'mawada', 'mawada', '$2y$10$oZ1HRnMGpBsRQUYzfPVkbORnveO2.BWWS8vQKRct.R34B1/GaKA.C', NULL, '2024-01-03 07:34:22', '2024-01-03 07:34:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjective_employees`
--
ALTER TABLE `adjective_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adjective_employees_adjname_unique` (`AdjName`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banks_bankname_unique` (`BankName`);

--
-- Indexes for table `bank_branches`
--
ALTER TABLE `bank_branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bank_branches_branchname_unique` (`BranchName`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_full_name_unique` (`full_name`),
  ADD UNIQUE KEY `employees_financial_figure_unique` (`financial_Figure`),
  ADD UNIQUE KEY `employees_filenumber_unique` (`fileNumber`),
  ADD UNIQUE KEY `employees_national_no_unique` (`national_no`),
  ADD KEY `employees_adjective_id_foreign` (`adjective_id`),
  ADD KEY `employees_bankname_id_foreign` (`bankName_id`),
  ADD KEY `employees_bankbranch_id_foreign` (`bankBranch_id`),
  ADD KEY `employees_unitbranch_id_foreign` (`unitBranch_id`);

--
-- Indexes for table `employees_officers`
--
ALTER TABLE `employees_officers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_officers_full_name_unique` (`full_name`),
  ADD UNIQUE KEY `employees_officers_filenumber_unique` (`fileNumber`),
  ADD UNIQUE KEY `employees_officers_national_no_unique` (`national_no`),
  ADD UNIQUE KEY `employees_officers_military_number_unique` (`military_number`),
  ADD UNIQUE KEY `employees_officers_bank_accountno_unique` (`bank_accountNo`);

--
-- Indexes for table `emp_datas`
--
ALTER TABLE `emp_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `unit_branches`
--
ALTER TABLE `unit_branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_branches_unitbranch_name_unique` (`unitBranch_Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjective_employees`
--
ALTER TABLE `adjective_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_branches`
--
ALTER TABLE `bank_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees_officers`
--
ALTER TABLE `employees_officers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_datas`
--
ALTER TABLE `emp_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit_branches`
--
ALTER TABLE `unit_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_adjective_id_foreign` FOREIGN KEY (`adjective_id`) REFERENCES `adjective_employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_bankbranch_id_foreign` FOREIGN KEY (`bankBranch_id`) REFERENCES `bank_branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_bankname_id_foreign` FOREIGN KEY (`bankName_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_unitbranch_id_foreign` FOREIGN KEY (`unitBranch_id`) REFERENCES `unit_branches` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
