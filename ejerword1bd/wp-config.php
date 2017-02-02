<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'ejerword1bd');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'Tr2 ZEM)qax5QJe%,D]%f;Q+&n.mx}#0%kXGd.a-;|]]8k3vC~W5<ASO _nH^shO');
define('SECURE_AUTH_KEY', 'VeL}/FSsT:Ts]%Xz?U=YP=x`:]hV-,Gs?%H5zYfan6c9&A2|s7*rcEWR=VgG+r_;');
define('LOGGED_IN_KEY', '}V7`5{7^SCm`o-YW(/9|fM4Vy[#Vo%)RocmF`b9x|$8OcB6o{gPT X)%F0%R0^^U');
define('NONCE_KEY', '|-PM0m7fp>A?r2N^znsdx~dm#ZR/}+4^xv7hecL@[(eUk#b6{qE23c>wzT*D.I3e');
define('AUTH_SALT', '+jPuwzWuNU Vr&Fc:jCHDz7dHDPAFcqRi_P>vXTyMm-i2bh4Pt9Y]&%zy2n4di.B');
define('SECURE_AUTH_SALT', 'wHoc%[4zE=TcJoP3Yjn:#jW3qFK-C(Nf::bC?X+vti%121ViA:>A-qQi9{o<:23t');
define('LOGGED_IN_SALT', '*U+u)L0XDzekO?,L&m[qF{_QR,a6TE5bgUsM2`j;FMkC=An1en59Nk`rT8NL7k2b');
define('NONCE_SALT', 'JB4Umi|Np|;f1S~irs5MA1#{i-&RC;cd4}<Zrt%m85_w^Ei^XihO+xrLZ>}+oR9}');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wpejerword1bd_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

