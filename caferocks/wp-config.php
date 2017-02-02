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
define('DB_NAME', 'caferocks');

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
define('AUTH_KEY', '6ixSLuMmw[f1Np23KEJuj6h5O.8XWR.bkX=,*`xV9s?ax}:Ks}TX)9L{dsGKqLnI');
define('SECURE_AUTH_KEY', '&ZSpJg)3#:jMEb6b=.ek{lMnTmwxp9wysAW/+Je{SO+`n$pcX<q4g=p}Pj>4W;wG');
define('LOGGED_IN_KEY', 'N !}O#ELaH4nbo{96dIO`:-i;mlz_iAI7$&)!}3w/7[rOV.$Z&5dWhqij&1@%vVJ');
define('NONCE_KEY', 'cqF|!,S)&cM]=4VXIw|94.jl*bx$/@I99V%3/|z_k8~fv%NLEki)mS#ns2!?l|p:');
define('AUTH_SALT', 'mkjHKImls,Lf)h&RdTTZFf38Z?(z!`w*kM~I6=pfq8rV]_~K4dgTAQz{)G*.#?Zo');
define('SECURE_AUTH_SALT', 'D@MF$Ei=P/v)x[7+N=TT4ddbY0DgbWvme<H{n/9L]qJ?]32e:K3<lWU&+v6GCx|t');
define('LOGGED_IN_SALT', 'TzD`-Hh0c&S9bAQS/(Cr&/CY{jf]pi9tPTCqusVH,|-HjB7v7yCqD5l|WyluHbZ!');
define('NONCE_SALT', 'dJ-wn1 C?>~SEIk`^^,P*#jD ?l5[>%/xXTSHU}_([1Q>m)Dp$jg3_+btJwPovxX');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wpcaferocks_';


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

