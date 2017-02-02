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
define('DB_NAME', 'avadacool');

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
define('AUTH_KEY', 'IoQ kGp<u0&Z,WTusxn>nvA3<is1RGM9z?cnmQwYaR#I`nh/pZHcA4!*%Hnenh$!');
define('SECURE_AUTH_KEY', 'MKjJhRc{o|?wBvC^*M@QR&/? <roAJbCA_$it+G:)>NCs5zz)lII=NVwT{(3BnL/');
define('LOGGED_IN_KEY', '290ZaMKfYu5F>a1QzB.;*Z$.kCh8,st=_|:N;wKitvaUB|ZtU==_t3wQ_d)jfJz.');
define('NONCE_KEY', 'm`o]NfXn[u>+@ZR#*81<mJsuPW,l1`x:WrcHz(?kx;Y4Hq7J;9~B;3pY,_G9B1l2');
define('AUTH_SALT', '?Ko`=UT1^|7o?>#FkcWhzLRteuRYevAc2pjJs_mYp$BYnw[3,<eVBW}HU.FT$7>V');
define('SECURE_AUTH_SALT', 'dE0%4X2PT6?F9YRUcMF+9qkL]Wa$(reH1bS`9.6b#2c|NT-b(0au~}T{1QEc4+Fq');
define('LOGGED_IN_SALT', '@a6&9mex!s(qy?ROP=mA`l@DSk*7gJ1[mku$m1E8 HP(zOFEKu=tM<F5$-H]{xti');
define('NONCE_SALT', ',Uw_0LnU)*}&lx$T3$zemCf6IeH0gt;nJ+KV[H?_o5~%SM5YwFWu}*e{Q(MGWQ^Q');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wptest3_';


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

