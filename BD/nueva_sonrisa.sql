-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2024 a las 22:08:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nueva_sonrisa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidads`
--

CREATE TABLE `especialidads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especialidads`
--

INSERT INTO `especialidads` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'diseno_sonrisa', 'Diseño Sonrisa', '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(2, 'endodoncia', 'Endodoncia', '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(3, 'periodoncia', 'Periodoncia', '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(4, 'cirugia_oral', 'Cirugía Oral', '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(5, 'coronas_protesis', 'Coronas y Prótesis', '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(6, 'calzas_blancas', 'Clazas Blancas (Resinas)', '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(7, 'ortodoncia', 'Ortodoncia', '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(8, 'higiene', 'Higiene Oral', '2024-12-19 02:07:51', '2024-12-19 02:07:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad_users`
--

CREATE TABLE `especialidad_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `especialidad_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `selector` bigint(20) NOT NULL,
  `doctor_id` bigint(20) NOT NULL,
  `descripcion` text NOT NULL,
  `start` date NOT NULL,
  `hora_cita` time NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `formularios`
--

CREATE TABLE `formularios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tipo_documento` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tratamiento` varchar(255) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `llamada` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(370, '2014_10_12_000000_create_users_table', 1),
(371, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(372, '2014_10_12_100000_create_password_resets_table', 1),
(373, '2019_08_19_000000_create_failed_jobs_table', 1),
(374, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(375, '2023_10_25_220807_create_roles_table', 1),
(376, '2023_10_25_221116_create_role_user_table', 1),
(377, '2023_10_29_031425_create_especialidads_table', 1),
(378, '2023_10_30_160840_create_especialidad_users_table', 1),
(379, '2023_10_31_173447_create_eventos_table', 1),
(380, '2024_08_07_220937_create_permission_tables', 1),
(381, '2024_10_02_002857_create_formularios_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2024-12-19 02:07:50', '2024-12-19 02:07:50'),
(2, 'paciente', 'Paciente', '2024-12-19 02:07:50', '2024-12-19 02:07:50'),
(3, 'doctor', 'Doctor', '2024-12-19 02:07:50', '2024-12-19 02:07:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(2, 3, 2, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(3, 3, 3, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(4, 3, 4, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(5, 3, 5, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(6, 3, 6, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(7, 1, 7, '2024-12-19 02:07:51', '2024-12-19 02:07:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tratamiento_datos` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `document`, `adress`, `email`, `email_verified_at`, `tel`, `password`, `tratamiento_datos`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Santiago', 'Giron Lozano', '1005893342', 'Cra 29 # 98 - 51', 'gironlozano1975@gmail.com', NULL, '3188048049', '$2y$10$bFjX05tRl8lHhJiT505xNeLS8ObAFrRngMkcZ8DRXBT88.UkpqIb2', 'si', NULL, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(2, 'Esteban', 'Gonzalez Ceballos', '1104804532', 'Cra 12e', 'estebangonzalez@gmail.com', NULL, '3162380774', '$2y$10$Z1xfzy.Gpy4tlH2kzurTtez0exrnwwNq2YZUiu83v0OSZKoMmjE6.', 'si', NULL, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(3, 'Julian Andres', 'Cifuentes Villada', '1006053806', 'Cra 21e # 43 - 50', 'cifu@gmail.com', NULL, '3177100525', '$2y$10$pCjBBZvFY2GWUF4mijWpP.9R/.IjUhyV1KbRvhDrLKspUILLwhcrm', 'si', NULL, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(4, 'Adriana', 'Lozano Zamorano', '66840413', 'Cra 54 # 32a - 24', 'alz@gmail.com', NULL, '3174125345', '$2y$10$WZ48ruad.vi3/7jZZajcSurpqP5EG0dV1omx1QDPEUts7NazbNAYC', 'si', NULL, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(5, 'Johns James', 'Giron Lozano', '94707431', 'Cra 74 # 23b - 46', 'joarasan@gmail.com', NULL, '3152341665', '$2y$10$W3nDjH9Oze2dPubX/vY5DOGxttytYnNVaZyx04ZojcPD4tav3al66', 'si', NULL, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(6, 'Camila', 'Rosero Noguera', '94145634', 'Cra 17f # 31 - 23', 'camirn@gmail.com', NULL, '318123991', '$2y$10$MYxUD0eI0z3wV0r.rt/Bkeu8Hl2wunzSj8GUx1PKIePnibtlkDtdu', 'si', NULL, '2024-12-19 02:07:51', '2024-12-19 02:07:51'),
(7, 'Andres Mauricio', 'Muñoz Puyo', '12345678', 'Cra 105 #12b-118', 'andrespuyo@gmail.com', NULL, '3106017492', '$2y$10$d7IiWnnrtfCiz9WAgj.gAuuJZ41tJ.AGdmRSDKJPjapHEDW5s2kV2', 'si', NULL, '2024-12-19 02:07:51', '2024-12-19 02:07:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidads`
--
ALTER TABLE `especialidads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidad_users`
--
ALTER TABLE `especialidad_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especialidad_users_user_id_foreign` (`user_id`),
  ADD KEY `especialidad_users_especialidad_id_foreign` (`especialidad_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `formularios`
--
ALTER TABLE `formularios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_document_unique` (`document`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especialidads`
--
ALTER TABLE `especialidads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `especialidad_users`
--
ALTER TABLE `especialidad_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formularios`
--
ALTER TABLE `formularios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especialidad_users`
--
ALTER TABLE `especialidad_users`
  ADD CONSTRAINT `especialidad_users_especialidad_id_foreign` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidads` (`id`),
  ADD CONSTRAINT `especialidad_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
