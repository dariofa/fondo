-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2017 a las 07:34:40
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fondo2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes`
--

CREATE TABLE `bienes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

CREATE TABLE `creditos` (
  `id` int(10) UNSIGNED NOT NULL,
  `num_credito` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_credito` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nu_cuotas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('activo','operando','inactivo','cancelado','rechazado','aceptado','pagado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactivo',
  `saldo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_act` date NOT NULL,
  `forma_pago` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credito_tipo_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cuenta_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos_tipo`
--

CREATE TABLE `creditos_tipo` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tasa_interes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credito_referencias`
--

CREATE TABLE `credito_referencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `parentesco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credito_id` int(10) UNSIGNED NOT NULL,
  `referencia_id` int(10) UNSIGNED NOT NULL,
  `referencia_tipo_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(10) UNSIGNED NOT NULL,
  `num_cuenta` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` int(11) NOT NULL,
  `saldo_anterior` int(11) NOT NULL,
  `cuenta_tipo_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_tipo`
--

CREATE TABLE `cuentas_tipo` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_labo_user`
--

CREATE TABLE `info_labo_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_prof_user`
--

CREATE TABLE `info_prof_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `nivel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_26_063019_create_referencias_tipo_table', 1),
(4, '2017_04_26_063350_create_referencias_table', 1),
(5, '2017_05_03_225312_create_movimientos_tipo_table', 1),
(6, '2017_05_05_225335_create_cuentas_tipo_table', 1),
(7, '2017_05_05_230236_create_cuentas_table', 1),
(8, '2017_05_05_230343_create_movimientos_cuenta_table', 1),
(9, '2017_05_07_224005_create_info_labo_user_table', 1),
(10, '2017_05_07_224314_create_info_prof_user_table', 1),
(11, '2017_05_09_173015_create_credito_tipo_table', 1),
(12, '2017_05_09_173630_create_credito_table', 1),
(13, '2017_05_10_163640_create_bienes_table', 1),
(14, '2017_05_11_235947_create_movimientos_credito_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_credito`
--

CREATE TABLE `movimientos_credito` (
  `id` int(10) UNSIGNED NOT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('pendiente','vencida','pagada') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `movimiento_tipo_id` int(10) UNSIGNED NOT NULL,
  `credito_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_cuenta`
--

CREATE TABLE `movimientos_cuenta` (
  `id` int(10) UNSIGNED NOT NULL,
  `valor` int(11) NOT NULL,
  `mes` date NOT NULL,
  `movimiento_tipo_id` int(10) UNSIGNED NOT NULL,
  `cuenta_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_tipo`
--

CREATE TABLE `movimientos_tipo` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias`
--

CREATE TABLE `referencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_doc` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_doc` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lug_exp_doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_laboral` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fec_nacimiento` date NOT NULL,
  `ing_mensuales` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias_tipo`
--

CREATE TABLE `referencias_tipo` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `dir_res` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `type_doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `num_doc` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `lug_exp_doc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `fecha_nac` date NOT NULL DEFAULT '2001-01-01',
  `lug_nac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `est_civil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `eps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `num_hijos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `est_laboral` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `pun_sisben` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No aplica',
  `type_rol` enum('admin','cliente','root') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bienes`
--
ALTER TABLE `bienes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bienes_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `creditos_num_credito_unique` (`num_credito`),
  ADD KEY `creditos_credito_tipo_id_foreign` (`credito_tipo_id`),
  ADD KEY `creditos_user_id_foreign` (`user_id`),
  ADD KEY `creditos_cuenta_id_foreign` (`cuenta_id`);

--
-- Indices de la tabla `creditos_tipo`
--
ALTER TABLE `creditos_tipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `creditos_tipo_name_unique` (`name`);

--
-- Indices de la tabla `credito_referencias`
--
ALTER TABLE `credito_referencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credito_referencias_credito_id_foreign` (`credito_id`),
  ADD KEY `credito_referencias_referencia_id_foreign` (`referencia_id`),
  ADD KEY `credito_referencias_referencia_tipo_id_foreign` (`referencia_tipo_id`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cuentas_num_cuenta_unique` (`num_cuenta`),
  ADD KEY `cuentas_cuenta_tipo_id_foreign` (`cuenta_tipo_id`),
  ADD KEY `cuentas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `cuentas_tipo`
--
ALTER TABLE `cuentas_tipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cuentas_tipo_name_unique` (`name`);

--
-- Indices de la tabla `info_labo_user`
--
ALTER TABLE `info_labo_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_labo_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `info_prof_user`
--
ALTER TABLE `info_prof_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `info_prof_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos_credito`
--
ALTER TABLE `movimientos_credito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimientos_credito_movimiento_tipo_id_foreign` (`movimiento_tipo_id`),
  ADD KEY `movimientos_credito_credito_id_foreign` (`credito_id`);

--
-- Indices de la tabla `movimientos_cuenta`
--
ALTER TABLE `movimientos_cuenta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimientos_cuenta_movimiento_tipo_id_foreign` (`movimiento_tipo_id`),
  ADD KEY `movimientos_cuenta_cuenta_id_foreign` (`cuenta_id`);

--
-- Indices de la tabla `movimientos_tipo`
--
ALTER TABLE `movimientos_tipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movimientos_tipo_name_unique` (`name`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referencias_num_doc_unique` (`num_doc`);

--
-- Indices de la tabla `referencias_tipo`
--
ALTER TABLE `referencias_tipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referencias_tipo_name_unique` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_num_doc_unique` (`num_doc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bienes`
--
ALTER TABLE `bienes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `creditos`
--
ALTER TABLE `creditos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `creditos_tipo`
--
ALTER TABLE `creditos_tipo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `credito_referencias`
--
ALTER TABLE `credito_referencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuentas_tipo`
--
ALTER TABLE `cuentas_tipo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `info_labo_user`
--
ALTER TABLE `info_labo_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `info_prof_user`
--
ALTER TABLE `info_prof_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `movimientos_credito`
--
ALTER TABLE `movimientos_credito`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `movimientos_cuenta`
--
ALTER TABLE `movimientos_cuenta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `movimientos_tipo`
--
ALTER TABLE `movimientos_tipo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `referencias_tipo`
--
ALTER TABLE `referencias_tipo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bienes`
--
ALTER TABLE `bienes`
  ADD CONSTRAINT `bienes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD CONSTRAINT `creditos_credito_tipo_id_foreign` FOREIGN KEY (`credito_tipo_id`) REFERENCES `creditos_tipo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `creditos_cuenta_id_foreign` FOREIGN KEY (`cuenta_id`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `creditos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `credito_referencias`
--
ALTER TABLE `credito_referencias`
  ADD CONSTRAINT `credito_referencias_credito_id_foreign` FOREIGN KEY (`credito_id`) REFERENCES `creditos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `credito_referencias_referencia_id_foreign` FOREIGN KEY (`referencia_id`) REFERENCES `referencias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `credito_referencias_referencia_tipo_id_foreign` FOREIGN KEY (`referencia_tipo_id`) REFERENCES `referencias_tipo` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_cuenta_tipo_id_foreign` FOREIGN KEY (`cuenta_tipo_id`) REFERENCES `cuentas_tipo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cuentas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `info_labo_user`
--
ALTER TABLE `info_labo_user`
  ADD CONSTRAINT `info_labo_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `info_prof_user`
--
ALTER TABLE `info_prof_user`
  ADD CONSTRAINT `info_prof_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `movimientos_credito`
--
ALTER TABLE `movimientos_credito`
  ADD CONSTRAINT `movimientos_credito_credito_id_foreign` FOREIGN KEY (`credito_id`) REFERENCES `creditos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movimientos_credito_movimiento_tipo_id_foreign` FOREIGN KEY (`movimiento_tipo_id`) REFERENCES `movimientos_tipo` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `movimientos_cuenta`
--
ALTER TABLE `movimientos_cuenta`
  ADD CONSTRAINT `movimientos_cuenta_cuenta_id_foreign` FOREIGN KEY (`cuenta_id`) REFERENCES `cuentas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movimientos_cuenta_movimiento_tipo_id_foreign` FOREIGN KEY (`movimiento_tipo_id`) REFERENCES `movimientos_tipo` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
