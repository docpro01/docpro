<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'm(#7:x/sJFV<X/7wn>c8)WnjxAuq7f%;I,,Wy_X;7{]56w.@01G-#A(Jz$DI8f:/');
define('SECURE_AUTH_KEY',  'Jv[nUeIsOxx?befx~+JU-#_zydUJ RqKQT<)>XkA$3!UIU<!#]q}z!2WH&/3UI8B');
define('LOGGED_IN_KEY',    'F6Tj|uW#v[c/K=2tI9xwBtI_90_j[ {VR(VW=`V2O:WAr}1-qG21Ocw%$$>mNAtE');
define('NONCE_KEY',        'Z6icK+)J/~h(& Ur8ws;v)v`I[SL6a3~j)O%e7.Flr(^a~%6~6.E2>PV#TG.p7OJ');
define('AUTH_SALT',        '=DSG;{DkA^P~]j18(z4X0el)qgEb R|hqWAP@-_{lX*e9O~I|TsiId{x{I3!f!Y<');
define('SECURE_AUTH_SALT', 'PKM#Pp;a<NN5RS~IhO,v+632(o&SaN{pM_qD=W6<HH8X[SwxM2RTtV%;3y)0j#a2');
define('LOGGED_IN_SALT',   'ADRwd*4}{g.K`ZO<A?Cz{_?koIi2[ZfK!-H{>waT-pqjQ|$oxf!(VWZB7~dLUi|<');
define('NONCE_SALT',       'fR)<hB,C,*M?*!!d6@|6h=[>$AF4c#6M1=%DPkk[FLz(11,6Sv*lv0d&woctQh&W');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
