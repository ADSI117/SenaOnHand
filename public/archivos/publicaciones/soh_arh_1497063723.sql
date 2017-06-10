-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2017 a las 05:07:22
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senaonhand`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publicacion_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publicacion_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `descripcion`, `publicacion_id`, `created_at`, `updated_at`) VALUES
(1, 'soh_1496768626.jpg', 1, '2017-06-06 22:03:46', '2017-06-06 22:03:46'),
(2, 'soh_1496768686.jpg', 1, '2017-06-06 22:04:46', '2017-06-06 22:04:46'),
(3, 'soh_1496768763.jpg', 3, '2017-06-06 22:06:03', '2017-06-06 22:06:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(37, '2017_04_27_164918_alter_centros_table', 1),
(38, '2017_04_27_165042_alter_sedes_table', 1),
(39, '2017_04_27_165236_alter_subcategorias_table', 1),
(40, '2017_05_31_171834_add_imagenes_table', 1),
(41, '2017_05_31_171911_add_archivos_table', 1),
(42, '2017_05_31_171941_add_videos_table', 1),
(43, '2017_06_06_162147_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_tag`
--

CREATE TABLE `publicacion_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `publicacion_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `publicacion_tag`
--

INSERT INTO `publicacion_tag` (`id`, `publicacion_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2017-06-06 22:03:46', '2017-06-06 22:03:46'),
(2, 1, 1, '2017-06-06 22:03:46', '2017-06-06 22:03:46'),
(3, 1, 4, '2017-06-06 22:03:46', '2017-06-06 22:03:46'),
(4, 2, 3, '2017-06-06 22:04:46', '2017-06-06 22:04:46'),
(5, 2, 1, '2017-06-06 22:04:46', '2017-06-06 22:04:46'),
(6, 2, 4, '2017-06-06 22:04:46', '2017-06-06 22:04:46'),
(7, 3, 4, '2017-06-06 22:06:03', '2017-06-06 22:06:03'),
(8, 3, 2, '2017-06-06 22:06:03', '2017-06-06 22:06:03'),
(9, 4, 2, '2017-06-07 07:09:04', '2017-06-07 07:09:04'),
(10, 5, 2, '2017-06-07 07:09:16', '2017-06-07 07:09:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguido_seguidor`
--

CREATE TABLE `seguido_seguidor` (
  `id` int(10) UNSIGNED NOT NULL,
  `seguido_id` int(10) UNSIGNED NOT NULL,
  `seguidor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_anuncios`
--

CREATE TABLE `tb_anuncios` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
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

CREATE TABLE `tb_calificaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `publicacion_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `puntaje` decimal(3,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_categorias`
--

INSERT INTO `tb_categorias` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Desarrollo web', NULL, NULL),
(2, 'Diseño grafico', NULL, NULL),
(3, 'Bases de datos', NULL, NULL),
(4, 'Modelado UML', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_centros`
--

CREATE TABLE `tb_centros` (
  `id` int(10) UNSIGNED NOT NULL,
  `regional_id` int(10) UNSIGNED NOT NULL,
  `acronimo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_centros`
--

INSERT INTO `tb_centros` (`id`, `regional_id`, `acronimo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'CEAI', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `publicacion_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_denuncias`
--

CREATE TABLE `tb_denuncias` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `publicacion_id` int(10) UNSIGNED NOT NULL,
  `comentario_id` int(10) UNSIGNED DEFAULT NULL,
  `tipo_id` int(10) UNSIGNED NOT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `comentario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estados_comentarios`
--

CREATE TABLE `tb_estados_comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estados_denuncias`
--

CREATE TABLE `tb_estados_denuncias` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estados_publicaciones`
--

CREATE TABLE `tb_estados_publicaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_estados_publicaciones`
--

INSERT INTO `tb_estados_publicaciones` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Borrador', NULL, NULL),
(2, 'Publicado', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estados_usuarios`
--

CREATE TABLE `tb_estados_usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_estados_usuarios`
--

INSERT INTO `tb_estados_usuarios` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Sin activar', NULL, NULL),
(2, 'Activo', NULL, NULL),
(3, 'Suspendido', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_grupos`
--

CREATE TABLE `tb_grupos` (
  `id` int(10) UNSIGNED NOT NULL,
  `programa_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_est` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_grupos`
--

INSERT INTO `tb_grupos` (`id`, `programa_id`, `usuario_id`, `nombre`, `cantidad_est`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'ADSI 117', 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mensajes`
--

CREATE TABLE `tb_mensajes` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `sala_id` int(10) UNSIGNED NOT NULL,
  `mensaje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_programas`
--

CREATE TABLE `tb_programas` (
  `id` int(10) UNSIGNED NOT NULL,
  `acronimo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_programas`
--

INSERT INTO `tb_programas` (`id`, `acronimo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'ADSI', 'Analisis y desarrolo de sistemas gastronomicos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_publicaciones`
--

CREATE TABLE `tb_publicaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subcategoria_id` int(10) UNSIGNED NOT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_publicaciones`
--

INSERT INTO `tb_publicaciones` (`id`, `user_id`, `subcategoria_id`, `estado_id`, `titulo`, `contenido`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, 'Internet de las cosas', 'Internet de las cosas (en inglés, Internet of things, abreviado IoT)1 2 es un concepto que se refiere a la interconexión digital de objetos cotidianos con internet.3 Alternativamente, Internet de las cosas es la conexión de Internet con “cosas u objetos” que personas.4 También se suele conocer como internet de todas las cosas o internet en las cosas. Si objetos de la vida cotidiana tuvieran incorporadas etiquetas de radio, podrían ser identificados y gestionados por otros equipos, de la misma manera que si lo fuesen por seres humanos.5 6', '2017-06-06 22:03:45', '2017-06-06 22:03:45'),
(2, 2, 1, 2, 'Domótica', 'Se llama domótica a los sistemas capaces de automatizar una vivienda o edificación de cualquier tipo, aportando servicios de gestión energética, seguridad, bienestar y comunicación, y que pueden estar integrados por medio de redes interiores y exteriores de comunicación, cableadas o inalámbricas, y cuyo control goza de cierta ubicuidad, desde dentro y fuera del hogar. Se podría definir como la integración de la tecnología en el diseño inteligente de un recinto cerrado.', '2017-06-06 22:04:46', '2017-06-06 22:04:46'),
(3, 2, 1, 2, 'Fotografía', 'La fotografía (de foto- y -grafía2 ) es el arte y la técnica de obtener imágenes duraderas debido a la acción de la luz.2 Es el proceso de proyectar imágenes y capturarlas, bien por medio del fijado en un medio sensible a la luz o por la conversión en señales electrónicas. Basándose en el principio de la cámara oscura, se proyecta una imagen captada por un pequeño agujero sobre una superficie, de tal forma que el tamaño de la imagen queda reducido. Para capturar y guardar esta imagen, las cámaras fotográficas utilizan película sensible para la fotografía analógica, mientras que en la fotografía digital se emplean sensores CCD, CMOS y memorias digitales', '2017-06-06 22:06:03', '2017-06-06 22:06:03'),
(4, 20, 1, 2, 'Procedimiento almacenado', 'Un procedimiento almacenado (stored procedure en inglés) es un programa (o procedimiento) almacenado físicamente en una base de datos. Su implementación varía de un gestor de bases de datos a otro. La ventaja de un procedimiento almacenado es que al ser ejecutado, en respuesta a una petición de usuario, es ejecutado directamente en el motor de bases de datos, el cual usualmente corre en un servidor separado. Como tal, posee acceso directo a los datos que necesita manipular y sólo necesita enviar sus resultados de regreso al usuario, deshaciéndose de la sobrecarga resultante de comunicar grandes cantidades de datos salientes y entrantes.', '2017-06-07 07:09:04', '2017-06-07 07:09:04'),
(5, 20, 1, 2, 'Procedimiento almacenado', 'Un procedimiento almacenado (stored procedure en inglés) es un programa (o procedimiento) almacenado físicamente en una base de datos. Su implementación varía de un gestor de bases de datos a otro. La ventaja de un procedimiento almacenado es que al ser ejecutado, en respuesta a una petición de usuario, es ejecutado directamente en el motor de bases de datos, el cual usualmente corre en un servidor separado. Como tal, posee acceso directo a los datos que necesita manipular y sólo necesita enviar sus resultados de regreso al usuario, deshaciéndose de la sobrecarga resultante de comunicar grandes cantidades de datos salientes y entrantes.', '2017-06-07 07:09:16', '2017-06-07 07:09:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_regionales`
--

CREATE TABLE `tb_regionales` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_regionales`
--

INSERT INTO `tb_regionales` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Valle', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Aprendiz', NULL, NULL),
(2, 'Instructor', NULL, NULL),
(3, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_salas`
--

CREATE TABLE `tb_salas` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_creador_id` int(10) UNSIGNED NOT NULL,
  `usuario_amigo_id` int(10) UNSIGNED NOT NULL,
  `grupo_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sedes`
--

CREATE TABLE `tb_sedes` (
  `id` int(10) UNSIGNED NOT NULL,
  `centro_id` int(10) UNSIGNED NOT NULL,
  `acronimo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_sedes`
--

INSERT INTO `tb_sedes` (`id`, `centro_id`, `acronimo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bla', 'Bretaña cali', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_seguidos`
--

CREATE TABLE `tb_seguidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_seguidor_id` int(10) UNSIGNED NOT NULL,
  `usuario_seguido_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_subcategorias`
--

CREATE TABLE `tb_subcategorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_subcategorias`
--

INSERT INTO `tb_subcategorias` (`id`, `categoria_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'HTML', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tags`
--

CREATE TABLE `tb_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_tags`
--

INSERT INTO `tb_tags` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'html5', NULL, NULL),
(2, 'web', NULL, NULL),
(3, 'Diseño', NULL, NULL),
(4, 'Tecnologia', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipos_denuncias`
--

CREATE TABLE `tb_tipos_denuncias` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_anuncio`
--

CREATE TABLE `tb_tipo_anuncio` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_doc`
--

CREATE TABLE `tb_tipo_doc` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_tipo_doc`
--

INSERT INTO `tb_tipo_doc` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Cedula', NULL, NULL),
(2, 'T.I.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `estado_id` int(10) UNSIGNED DEFAULT NULL,
  `grupo_id` int(10) UNSIGNED DEFAULT NULL,
  `sede_id` int(10) UNSIGNED DEFAULT NULL,
  `tipo_doc_id` int(10) UNSIGNED DEFAULT NULL,
  `num_doc` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombres` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nac` datetime DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `profesion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_foto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rol_id`, `estado_id`, `grupo_id`, `sede_id`, `tipo_doc_id`, `num_doc`, `nombres`, `apellidos`, `fecha_nac`, `email`, `profesion`, `url_foto`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, 1, 2, '11111', 'Aprendiz', 'Uno', '2017-06-05 00:00:00', 'aprendiz@misena.edu.co', 'Lavaplatos', 'soh_profile_1496683614.png', '$2y$10$c8TmPyeec672Itad4thnw.Su4elMiahfbZucNZDZ4cutYutjxPTLy', 'ssuQlUt4OazGw2Wg963TaEmAi6VuoMCTCSAVQskUbSfvT4nzIhPycjxI9Wvi', '2017-06-01 09:04:58', '2017-06-06 03:26:54'),
(2, 2, 2, 1, 1, 2, '123456', 'Marino', 'Solapas', '2017-06-06 00:00:00', 'instructor@sena.edu.co', 'Instructor', 'soh_profile_1496683918.png', '$2y$10$ZyT0W5m9n7QMY1PEx9NT..dfLclf1mpmYwfm4zBBaMq7c7ooCGxqS', 'xCETKFI7ykAtzgWORB32jvDVRjaneJU7YAhmYdDzIvYsczD8KBadtx8ks0UP', '2017-06-01 09:05:19', '2017-06-07 07:05:11'),
(3, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@sena.edu.co', NULL, NULL, '$2y$10$lXprAbZM.MmcEJDAXJOYvOS8V6FaV7/HBwH1xiyFTyk.lniaw48QW', 'NyxgHbXfkEKNEgC71ODvMpWN0W2wzCt2II4xvsGy1uUhNXOfZzGTBCeZP6u3', '2017-06-01 09:05:36', '2017-06-01 09:05:36'),
(15, 1, 2, 1, 1, 1, '123456789', 'Diego', 'Suárez', '1987-12-22 00:00:00', 'djbolanos8@misena.edu.co', 'Tecnólogo', 'soh_profile_1496724766.jpg', '$2y$10$D4H4dvrGjlFbAZNIUfk2Yu/qgjwtAo0r8u4TeTYlBangz864DvAlS', 'bi01ApVC4XyCkWchLHyfejToQbegPLpOZljkyoQHoyflmu35aDKODtwxzB8G', '2017-06-06 05:01:48', '2017-06-06 09:52:46'),
(16, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'santiago@misena.edu.co', NULL, NULL, '$2y$10$.LtNjGfaW.WTaxyJfa.fQuPuj3DMUNHDc46bLnUGfpu16Ki9H11EK', 'cOH5hHkOJ4VOt1vwO74FMu5GKWyx31XE3vGFozYNkB8W2hgF2xie7YwtW6D4', '2017-06-06 05:11:01', '2017-06-06 05:11:36'),
(17, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mauricio@misena.edu.co', NULL, NULL, '$2y$10$LZndHuIBqU54lcDgEmh2u.NyrLsbzhnqChbqZVZNfHxEJn13nnzxq', '8b6jH0SIZNZXvF6cNG2TMOWxEkr1DADoWDPa3OwWJQ6HyLiyK6nBm0b42rzE', '2017-06-06 01:23:31', '2017-06-06 01:23:31'),
(19, 1, 2, 1, 1, 2, '12365245852', 'Maria', 'Aprendiz', '2017-06-06 00:00:00', 'maria@misena.edu.co', 'TEcnica de sistemas', 'soh_profile_1496802069.png', '$2y$10$o7qRT/C4jEjqTZu4CcE/qeu1lD6OOulCFD.2jAwC1BhjFWYhBXCqa', 'CC9Us7TI0lBj0krUw6Hw2QH8C5JLN1sAJFqbKF8UTlla9J3RV5a9ln1dRmkp', '2017-06-06 19:13:52', '2017-06-07 07:21:09'),
(20, 2, 2, 1, 1, 2, '1236521452', 'Carlos', 'Gonzales', '2017-06-06 00:00:00', 'instructor2@sena.edu.co', 'Ing de sistemas', 'soh_profile_1496801485.png', '$2y$10$pJ94mvYcyATpigoV8WhLE.5s34HvjfGjjHk6TewKbtFeI16LuaGgC', 'vxJGWtFY08VzMXWwxTNYW1eNx8BuWaHJ3dITuqXSTwbcFULgb6pWVOeXcMRa', '2017-06-07 07:06:09', '2017-06-07 07:11:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_categoria`
--

CREATE TABLE `usuario_categoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_categoria`
--

INSERT INTO `usuario_categoria` (`id`, `user_id`, `categoria_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2017-06-06 02:48:25', '2017-06-06 02:48:25'),
(5, 20, 1, '2017-06-07 07:06:29', '2017-06-07 07:06:29'),
(6, 20, 2, '2017-06-07 07:06:30', '2017-06-07 07:06:30'),
(7, 20, 3, '2017-06-07 07:06:30', '2017-06-07 07:06:30'),
(8, 20, 4, '2017-06-07 07:06:31', '2017-06-07 07:06:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publicacion_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivos_publicacion_id_foreign` (`publicacion_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagenes_publicacion_id_foreign` (`publicacion_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `publicacion_tag`
--
ALTER TABLE `publicacion_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publicacion_tag_publicacion_id_foreign` (`publicacion_id`),
  ADD KEY `publicacion_tag_tag_id_foreign` (`tag_id`);

--
-- Indices de la tabla `seguido_seguidor`
--
ALTER TABLE `seguido_seguidor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguido_seguidor_seguido_id_foreign` (`seguido_id`),
  ADD KEY `seguido_seguidor_seguidor_id_foreign` (`seguidor_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indices de la tabla `tb_anuncios`
--
ALTER TABLE `tb_anuncios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_anuncios_tipo_id_foreign` (`tipo_id`),
  ADD KEY `tb_anuncios_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `tb_calificaciones`
--
ALTER TABLE `tb_calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_calificaciones_publicacion_id_foreign` (`publicacion_id`),
  ADD KEY `tb_calificaciones_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_categorias_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_centros`
--
ALTER TABLE `tb_centros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_centros_acronimo_unique` (`acronimo`),
  ADD UNIQUE KEY `tb_centros_descripcion_unique` (`descripcion`),
  ADD KEY `tb_centros_regional_id_foreign` (`regional_id`);

--
-- Indices de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_comentarios_publicacion_id_foreign` (`publicacion_id`),
  ADD KEY `tb_comentarios_usuario_id_foreign` (`usuario_id`),
  ADD KEY `tb_comentarios_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `tb_denuncias`
--
ALTER TABLE `tb_denuncias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_denuncias_usuario_id_foreign` (`usuario_id`),
  ADD KEY `tb_denuncias_publicacion_id_foreign` (`publicacion_id`),
  ADD KEY `tb_denuncias_comentario_id_foreign` (`comentario_id`),
  ADD KEY `tb_denuncias_tipo_id_foreign` (`tipo_id`),
  ADD KEY `tb_denuncias_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `tb_estados_comentarios`
--
ALTER TABLE `tb_estados_comentarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_estados_comentarios_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_estados_denuncias`
--
ALTER TABLE `tb_estados_denuncias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_estados_denuncias_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_estados_publicaciones`
--
ALTER TABLE `tb_estados_publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_estados_publicaciones_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_estados_usuarios`
--
ALTER TABLE `tb_estados_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_estados_usuarios_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_grupos`
--
ALTER TABLE `tb_grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_grupos_programa_id_foreign` (`programa_id`),
  ADD KEY `tb_grupos_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `tb_mensajes`
--
ALTER TABLE `tb_mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_mensajes_usuario_id_foreign` (`usuario_id`),
  ADD KEY `tb_mensajes_sala_id_foreign` (`sala_id`);

--
-- Indices de la tabla `tb_programas`
--
ALTER TABLE `tb_programas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_programas_acronimo_unique` (`acronimo`),
  ADD UNIQUE KEY `tb_programas_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_publicaciones`
--
ALTER TABLE `tb_publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_publicaciones_usuario_id_foreign` (`user_id`),
  ADD KEY `tb_publicaciones_subcategoria_id_foreign` (`subcategoria_id`),
  ADD KEY `tb_publicaciones_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `tb_regionales`
--
ALTER TABLE `tb_regionales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_regionales_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_roles_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_salas`
--
ALTER TABLE `tb_salas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_salas_usuario_creador_id_foreign` (`usuario_creador_id`),
  ADD KEY `tb_salas_usuario_amigo_id_foreign` (`usuario_amigo_id`),
  ADD KEY `tb_salas_grupo_id_foreign` (`grupo_id`);

--
-- Indices de la tabla `tb_sedes`
--
ALTER TABLE `tb_sedes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_sedes_acronimo_unique` (`acronimo`),
  ADD UNIQUE KEY `tb_sedes_descripcion_unique` (`descripcion`),
  ADD KEY `tb_sedes_centro_id_foreign` (`centro_id`);

--
-- Indices de la tabla `tb_seguidos`
--
ALTER TABLE `tb_seguidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_seguidos_usuario_seguidor_id_foreign` (`usuario_seguidor_id`),
  ADD KEY `tb_seguidos_usuario_seguido_id_foreign` (`usuario_seguido_id`);

--
-- Indices de la tabla `tb_subcategorias`
--
ALTER TABLE `tb_subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_subcategorias_descripcion_unique` (`descripcion`),
  ADD KEY `tb_subcategorias_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `tb_tags`
--
ALTER TABLE `tb_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_tipos_denuncias`
--
ALTER TABLE `tb_tipos_denuncias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_tipos_denuncias_descripcion_unique` (`descripcion`);

--
-- Indices de la tabla `tb_tipo_anuncio`
--
ALTER TABLE `tb_tipo_anuncio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_tipo_anuncio_nombre_unique` (`nombre`);

--
-- Indices de la tabla `tb_tipo_doc`
--
ALTER TABLE `tb_tipo_doc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_tipo_doc_nombre_unique` (`nombre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rol_id_foreign` (`rol_id`),
  ADD KEY `users_estado_id_foreign` (`estado_id`),
  ADD KEY `users_grupo_id_foreign` (`grupo_id`),
  ADD KEY `users_sede_id_foreign` (`sede_id`),
  ADD KEY `users_tipo_doc_id_foreign` (`tipo_doc_id`);

--
-- Indices de la tabla `usuario_categoria`
--
ALTER TABLE `usuario_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_categoria_usuario_id_foreign` (`user_id`),
  ADD KEY `usuario_categoria_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_publicacion_id_foreign` (`publicacion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `publicacion_tag`
--
ALTER TABLE `publicacion_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `seguido_seguidor`
--
ALTER TABLE `seguido_seguidor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_anuncios`
--
ALTER TABLE `tb_anuncios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_calificaciones`
--
ALTER TABLE `tb_calificaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_centros`
--
ALTER TABLE `tb_centros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_denuncias`
--
ALTER TABLE `tb_denuncias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_estados_comentarios`
--
ALTER TABLE `tb_estados_comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_estados_denuncias`
--
ALTER TABLE `tb_estados_denuncias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_estados_publicaciones`
--
ALTER TABLE `tb_estados_publicaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_estados_usuarios`
--
ALTER TABLE `tb_estados_usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_grupos`
--
ALTER TABLE `tb_grupos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_mensajes`
--
ALTER TABLE `tb_mensajes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_programas`
--
ALTER TABLE `tb_programas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_publicaciones`
--
ALTER TABLE `tb_publicaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_regionales`
--
ALTER TABLE `tb_regionales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_salas`
--
ALTER TABLE `tb_salas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_sedes`
--
ALTER TABLE `tb_sedes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_seguidos`
--
ALTER TABLE `tb_seguidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_subcategorias`
--
ALTER TABLE `tb_subcategorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tb_tags`
--
ALTER TABLE `tb_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_tipos_denuncias`
--
ALTER TABLE `tb_tipos_denuncias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_tipo_anuncio`
--
ALTER TABLE `tb_tipo_anuncio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_tipo_doc`
--
ALTER TABLE `tb_tipo_doc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `usuario_categoria`
--
ALTER TABLE `usuario_categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_publicacion_id_foreign` FOREIGN KEY (`publicacion_id`) REFERENCES `tb_publicaciones` (`id`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_publicacion_id_foreign` FOREIGN KEY (`publicacion_id`) REFERENCES `tb_publicaciones` (`id`);

--
-- Filtros para la tabla `publicacion_tag`
--
ALTER TABLE `publicacion_tag`
  ADD CONSTRAINT `publicacion_tag_publicacion_id_foreign` FOREIGN KEY (`publicacion_id`) REFERENCES `tb_publicaciones` (`id`),
  ADD CONSTRAINT `publicacion_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tb_tags` (`id`);

--
-- Filtros para la tabla `seguido_seguidor`
--
ALTER TABLE `seguido_seguidor`
  ADD CONSTRAINT `seguido_seguidor_seguido_id_foreign` FOREIGN KEY (`seguido_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `seguido_seguidor_seguidor_id_foreign` FOREIGN KEY (`seguidor_id`) REFERENCES `users` (`id`);

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
  ADD CONSTRAINT `tb_publicaciones_usuario_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `tb_estados_usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `tb_grupos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `tb_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_sede_id_foreign` FOREIGN KEY (`sede_id`) REFERENCES `tb_sedes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_tipo_doc_id_foreign` FOREIGN KEY (`tipo_doc_id`) REFERENCES `tb_tipo_doc` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario_categoria`
--
ALTER TABLE `usuario_categoria`
  ADD CONSTRAINT `usuario_categoria_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `tb_categorias` (`id`),
  ADD CONSTRAINT `usuario_categoria_usuario_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_publicacion_id_foreign` FOREIGN KEY (`publicacion_id`) REFERENCES `tb_publicaciones` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
