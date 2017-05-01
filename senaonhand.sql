-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2017 a las 07:55:00
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `senaonhand`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_26_035414_add_regionales_table', 1),
(4, '2017_04_26_041531_add_tipo_doc_table', 1),
(5, '2017_04_26_041820_add_programas_table', 1),
(6, '2017_04_26_042146_add_estados_usuarios_table', 1),
(7, '2017_04_26_042400_add_estados_comentarios_table', 1),
(8, '2017_04_26_042539_add_roles_table', 1),
(9, '2017_04_26_042723_add_estados_publicaciones_table', 1),
(10, '2017_04_26_042858_add_categorias_table', 1),
(11, '2017_04_26_043214_add_tipo_anuncio_table', 1),
(12, '2017_04_26_044053_add_estados_denuncias_table', 1),
(13, '2017_04_26_044327_add_tipos_denuncias_table', 1),
(14, '2017_04_26_050901_add_centros_table', 1),
(15, '2017_04_26_052212_add_sedes_table', 1),
(16, '2017_04_26_151914_add_subcategorias_table', 1),
(17, '2017_04_26_152659_add_anuncios_table', 1),
(18, '2017_04_26_160831_add_calificaciones_table', 1),
(19, '2017_04_26_162734_add_comentarios_table', 1),
(20, '2017_04_26_165226_add_denuncias_table', 1),
(21, '2017_04_26_170509_add_grupos_table', 1),
(22, '2017_04_26_171520_add_mensajes_table', 1),
(23, '2017_04_26_172413_add_publicaciones_table', 1),
(24, '2017_04_26_173344_add_salas_table', 1),
(25, '2017_04_26_173908_add_seguidos_table', 1),
(26, '2017_04_26_174318_add_tags_table', 1),
(27, '2017_04_27_044705_alter_tb_anuncios_table', 1),
(28, '2017_04_27_045038_alter_users_table', 1),
(29, '2017_04_27_155249_alter_tb_calificaciones_table', 1),
(30, '2017_04_27_160650_alter_comentarios_table', 1),
(31, '2017_04_27_161358_alter_denuncias_table', 1),
(32, '2017_04_27_162501_alter_grupos_table', 1),
(33, '2017_04_27_162939_alter_mensajes_table', 1),
(34, '2017_04_27_163449_alter_publicaciones_table', 1),
(35, '2017_04_27_163848_alter_salas_table', 1),
(36, '2017_04_27_164324_alter_seguidos_table', 1),
(37, '2017_04_27_164559_alter_tags_table', 1),
(38, '2017_04_27_164918_alter_centros_table', 1),
(39, '2017_04_27_165042_alter_sedes_table', 1),
(40, '2017_04_27_165236_alter_subcategorias_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_anuncios`
--

CREATE TABLE IF NOT EXISTS `tb_anuncios` (
  `id` int(10) unsigned NOT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `titulo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_imagen` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `lugar` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_calificaciones`
--

CREATE TABLE IF NOT EXISTS `tb_calificaciones` (
  `id` int(10) unsigned NOT NULL,
  `publicacion_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `puntaje` decimal(3,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE IF NOT EXISTS `tb_categorias` (
  `id` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_centros`
--

CREATE TABLE IF NOT EXISTS `tb_centros` (
  `id` int(10) unsigned NOT NULL,
  `regional_id` int(10) unsigned NOT NULL,
  `acronimo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comentarios`
--

CREATE TABLE IF NOT EXISTS `tb_comentarios` (
  `id` int(10) unsigned NOT NULL,
  `publicacion_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  `comentario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_denuncias`
--

CREATE TABLE IF NOT EXISTS `tb_denuncias` (
  `id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `publicacion_id` int(10) unsigned NOT NULL,
  `comentario_id` int(10) unsigned DEFAULT NULL,
  `tipo_id` int(10) unsigned NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  `comentario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estados_comentarios`
--

CREATE TABLE IF NOT EXISTS `tb_estados_comentarios` (
  `id` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estados_denuncias`
--

CREATE TABLE IF NOT EXISTS `tb_estados_denuncias` (
  `id` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estados_publicaciones`
--

CREATE TABLE IF NOT EXISTS `tb_estados_publicaciones` (
  `id` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estados_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_estados_usuarios` (
  `id` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_grupos`
--

CREATE TABLE IF NOT EXISTS `tb_grupos` (
  `id` int(10) unsigned NOT NULL,
  `programa_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_est` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mensajes`
--

CREATE TABLE IF NOT EXISTS `tb_mensajes` (
  `id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `sala_id` int(10) unsigned NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_programas`
--

CREATE TABLE IF NOT EXISTS `tb_programas` (
  `id` int(10) unsigned NOT NULL,
  `acronimo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_publicaciones`
--

CREATE TABLE IF NOT EXISTS `tb_publicaciones` (
  `id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `subcategoria_id` int(10) unsigned NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  `titulo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_video` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_archivo` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_regionales`
--

CREATE TABLE IF NOT EXISTS `tb_regionales` (
  `id` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE IF NOT EXISTS `tb_roles` (
  `id` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_salas`
--

CREATE TABLE IF NOT EXISTS `tb_salas` (
  `id` int(10) unsigned NOT NULL,
  `usuario_creador_id` int(10) unsigned NOT NULL,
  `usuario_amigo_id` int(10) unsigned NOT NULL,
  `grupo_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sedes`
--

CREATE TABLE IF NOT EXISTS `tb_sedes` (
  `id` int(10) unsigned NOT NULL,
  `centro_id` int(10) unsigned NOT NULL,
  `acronimo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seguidos`
--

CREATE TABLE IF NOT EXISTS `tb_seguidos` (
  `id` int(10) unsigned NOT NULL,
  `usuario_seguidor_id` int(10) unsigned NOT NULL,
  `usuario_seguido_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_subcategorias`
--

CREATE TABLE IF NOT EXISTS `tb_subcategorias` (
  `id` int(10) unsigned NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tags`
--

CREATE TABLE IF NOT EXISTS `tb_tags` (
  `id` int(10) unsigned NOT NULL,
  `publicacion_id` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipos_denuncias`
--

CREATE TABLE IF NOT EXISTS `tb_tipos_denuncias` (
  `id` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_anuncio`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_anuncio` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_doc`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_doc` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `rol_id` int(10) unsigned NOT NULL,
  `estado_id` int(10) unsigned DEFAULT NULL,
  `grupo_id` int(10) unsigned DEFAULT NULL,
  `sede_id` int(10) unsigned DEFAULT NULL,
  `tipo_doc_id` int(10) unsigned DEFAULT NULL,
  `num_doc` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombres` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nac` datetime DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `profesion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_foto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `tb_anuncios`
--
ALTER TABLE `tb_anuncios`
  ADD PRIMARY KEY (`id`), ADD KEY `tb_anuncios_tipo_id_foreign` (`tipo_id`), ADD KEY `tb_anuncios_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `tb_calificaciones`
--
ALTER TABLE `tb_calificaciones`
  ADD PRIMARY KEY (`id`), ADD KEY `tb_calificaciones_publicacion_id_foreign` (`publicacion_id`), ADD KEY `tb_calificaciones_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_categorias_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_centros`
--
ALTER TABLE `tb_centros`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_centros_acronimo_unique` (`acronimo`), ADD UNIQUE KEY `tb_centros_descripcion_unique` (`descripcion`), ADD KEY `tb_centros_regional_id_foreign` (`regional_id`);

--
-- Indices de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`id`), ADD KEY `tb_comentarios_publicacion_id_foreign` (`publicacion_id`), ADD KEY `tb_comentarios_usuario_id_foreign` (`usuario_id`), ADD KEY `tb_comentarios_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `tb_denuncias`
--
ALTER TABLE `tb_denuncias`
  ADD PRIMARY KEY (`id`), ADD KEY `tb_denuncias_usuario_id_foreign` (`usuario_id`), ADD KEY `tb_denuncias_publicacion_id_foreign` (`publicacion_id`), ADD KEY `tb_denuncias_comentario_id_foreign` (`comentario_id`), ADD KEY `tb_denuncias_tipo_id_foreign` (`tipo_id`), ADD KEY `tb_denuncias_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `tb_estados_comentarios`
--
ALTER TABLE `tb_estados_comentarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_estados_comentarios_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_estados_denuncias`
--
ALTER TABLE `tb_estados_denuncias`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_estados_denuncias_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_estados_publicaciones`
--
ALTER TABLE `tb_estados_publicaciones`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_estados_publicaciones_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_estados_usuarios`
--
ALTER TABLE `tb_estados_usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_estados_usuarios_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_grupos`
--
ALTER TABLE `tb_grupos`
  ADD PRIMARY KEY (`id`), ADD KEY `tb_grupos_programa_id_foreign` (`programa_id`), ADD KEY `tb_grupos_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `tb_mensajes`
--
ALTER TABLE `tb_mensajes`
  ADD PRIMARY KEY (`id`), ADD KEY `tb_mensajes_usuario_id_foreign` (`usuario_id`), ADD KEY `tb_mensajes_sala_id_foreign` (`sala_id`);

--
-- Indices de la tabla `tb_programas`
--
ALTER TABLE `tb_programas`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_programas_acronimo_unique` (`acronimo`), ADD UNIQUE KEY `tb_programas_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_publicaciones`
--
ALTER TABLE `tb_publicaciones`
  ADD PRIMARY KEY (`id`), ADD KEY `tb_publicaciones_usuario_id_foreign` (`usuario_id`), ADD KEY `tb_publicaciones_subcategoria_id_foreign` (`subcategoria_id`), ADD KEY `tb_publicaciones_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `tb_regionales`
--
ALTER TABLE `tb_regionales`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_regionales_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_roles_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_salas`
--
ALTER TABLE `tb_salas`
  ADD PRIMARY KEY (`id`), ADD KEY `tb_salas_usuario_creador_id_foreign` (`usuario_creador_id`), ADD KEY `tb_salas_usuario_amigo_id_foreign` (`usuario_amigo_id`), ADD KEY `tb_salas_grupo_id_foreign` (`grupo_id`);

--
-- Indices de la tabla `tb_sedes`
--
ALTER TABLE `tb_sedes`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_sedes_acronimo_unique` (`acronimo`), ADD UNIQUE KEY `tb_sedes_descripcion_unique` (`descripcion`), ADD KEY `tb_sedes_centro_id_foreign` (`centro_id`);

--
-- Indices de la tabla `tb_seguidos`
--
ALTER TABLE `tb_seguidos`
  ADD PRIMARY KEY (`id`), ADD KEY `tb_seguidos_usuario_seguidor_id_foreign` (`usuario_seguidor_id`), ADD KEY `tb_seguidos_usuario_seguido_id_foreign` (`usuario_seguido_id`);

--
-- Indices de la tabla `tb_subcategorias`
--
ALTER TABLE `tb_subcategorias`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_subcategorias_descripcion_unique` (`descripcion`), ADD KEY `tb_subcategorias_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `tb_tags`
--
ALTER TABLE `tb_tags`
  ADD PRIMARY KEY (`id`), ADD KEY `tb_tags_publicacion_id_foreign` (`publicacion_id`);

--
-- Indices de la tabla `tb_tipos_denuncias`
--
ALTER TABLE `tb_tipos_denuncias`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_tipos_denuncias_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_tipo_anuncio`
--
ALTER TABLE `tb_tipo_anuncio`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_tipo_anuncio_nombre_unique` (`nombre`);

--
-- Indices de la tabla `tb_tipo_doc`
--
ALTER TABLE `tb_tipo_doc`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tb_tipo_doc_nombre_unique` (`nombre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD KEY `users_rol_id_foreign` (`rol_id`), ADD KEY `users_estado_id_foreign` (`estado_id`), ADD KEY `users_grupo_id_foreign` (`grupo_id`), ADD KEY `users_sede_id_foreign` (`sede_id`), ADD KEY `users_tipo_doc_id_foreign` (`tipo_doc_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `tb_anuncios`
--
ALTER TABLE `tb_anuncios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_calificaciones`
--
ALTER TABLE `tb_calificaciones`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_centros`
--
ALTER TABLE `tb_centros`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_denuncias`
--
ALTER TABLE `tb_denuncias`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_estados_comentarios`
--
ALTER TABLE `tb_estados_comentarios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_estados_denuncias`
--
ALTER TABLE `tb_estados_denuncias`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_estados_publicaciones`
--
ALTER TABLE `tb_estados_publicaciones`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_estados_usuarios`
--
ALTER TABLE `tb_estados_usuarios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_grupos`
--
ALTER TABLE `tb_grupos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_mensajes`
--
ALTER TABLE `tb_mensajes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_programas`
--
ALTER TABLE `tb_programas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_publicaciones`
--
ALTER TABLE `tb_publicaciones`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_regionales`
--
ALTER TABLE `tb_regionales`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_salas`
--
ALTER TABLE `tb_salas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_sedes`
--
ALTER TABLE `tb_sedes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_seguidos`
--
ALTER TABLE `tb_seguidos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_subcategorias`
--
ALTER TABLE `tb_subcategorias`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_tags`
--
ALTER TABLE `tb_tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_tipos_denuncias`
--
ALTER TABLE `tb_tipos_denuncias`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_tipo_anuncio`
--
ALTER TABLE `tb_tipo_anuncio`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_tipo_doc`
--
ALTER TABLE `tb_tipo_doc`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_anuncios`
--
ALTER TABLE `tb_anuncios`
ADD CONSTRAINT `tb_anuncios_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tb_tipo_anuncio` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_anuncios_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_calificaciones`
--
ALTER TABLE `tb_calificaciones`
ADD CONSTRAINT `tb_calificaciones_publicacion_id_foreign` FOREIGN KEY (`publicacion_id`) REFERENCES `tb_publicaciones` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_calificaciones_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_centros`
--
ALTER TABLE `tb_centros`
ADD CONSTRAINT `tb_centros_regional_id_foreign` FOREIGN KEY (`regional_id`) REFERENCES `tb_regionales` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
ADD CONSTRAINT `tb_comentarios_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `tb_estados_publicaciones` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_comentarios_publicacion_id_foreign` FOREIGN KEY (`publicacion_id`) REFERENCES `tb_publicaciones` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_comentarios_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_denuncias`
--
ALTER TABLE `tb_denuncias`
ADD CONSTRAINT `tb_denuncias_comentario_id_foreign` FOREIGN KEY (`comentario_id`) REFERENCES `tb_comentarios` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_denuncias_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `tb_estados_denuncias` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_denuncias_publicacion_id_foreign` FOREIGN KEY (`publicacion_id`) REFERENCES `tb_publicaciones` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_denuncias_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tb_tipos_denuncias` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_denuncias_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_grupos`
--
ALTER TABLE `tb_grupos`
ADD CONSTRAINT `tb_grupos_programa_id_foreign` FOREIGN KEY (`programa_id`) REFERENCES `tb_programas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_grupos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_mensajes`
--
ALTER TABLE `tb_mensajes`
ADD CONSTRAINT `tb_mensajes_sala_id_foreign` FOREIGN KEY (`sala_id`) REFERENCES `tb_salas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_mensajes_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_publicaciones`
--
ALTER TABLE `tb_publicaciones`
ADD CONSTRAINT `tb_publicaciones_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `tb_estados_publicaciones` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_publicaciones_subcategoria_id_foreign` FOREIGN KEY (`subcategoria_id`) REFERENCES `tb_subcategorias` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_publicaciones_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_salas`
--
ALTER TABLE `tb_salas`
ADD CONSTRAINT `tb_salas_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `tb_grupos` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_salas_usuario_amigo_id_foreign` FOREIGN KEY (`usuario_amigo_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_salas_usuario_creador_id_foreign` FOREIGN KEY (`usuario_creador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_sedes`
--
ALTER TABLE `tb_sedes`
ADD CONSTRAINT `tb_sedes_centro_id_foreign` FOREIGN KEY (`centro_id`) REFERENCES `tb_centros` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_seguidos`
--
ALTER TABLE `tb_seguidos`
ADD CONSTRAINT `tb_seguidos_usuario_seguido_id_foreign` FOREIGN KEY (`usuario_seguido_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tb_seguidos_usuario_seguidor_id_foreign` FOREIGN KEY (`usuario_seguidor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_subcategorias`
--
ALTER TABLE `tb_subcategorias`
ADD CONSTRAINT `tb_subcategorias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `tb_categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_tags`
--
ALTER TABLE `tb_tags`
ADD CONSTRAINT `tb_tags_publicacion_id_foreign` FOREIGN KEY (`publicacion_id`) REFERENCES `tb_publicaciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `tb_estados_usuarios` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `users_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `tb_grupos` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `tb_roles` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `users_sede_id_foreign` FOREIGN KEY (`sede_id`) REFERENCES `tb_sedes` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `users_tipo_doc_id_foreign` FOREIGN KEY (`tipo_doc_id`) REFERENCES `tb_tipo_doc` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
