<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rmc');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


/** Postcodes DB Info */
define('postcode_db','aus_postcodes');
define('postcode_uname','root');
define('postcode_pword','root');

/** Google API Key */
define('GOOGLE_API_KEY','AIzaSyCV10XdJrY0xgH97cHmfZuKdddElZLeRFU');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8#ft*C7?~-q+z>j%+No*f3.8Du.?u{sFS]-,v^0svIo$rsx[EtBR(2$VN)8xk+:|');
define('SECURE_AUTH_KEY',  'cERQ%B+U6=s!CNs{eRBrR7$*<lh}P~SPIHPp0+na-s:V@]AunwhUGkSe>y8p{M$1');
define('LOGGED_IN_KEY',    '37FKuGHDTX~$TrvWUYF{&}n-2J}_m;48(_o8 -XllFX?r`[Z9K4hB}XVUDvK@r>0');
define('NONCE_KEY',        'zW&.tYX$2$-ope^GQ;P=%MEy~KX-T,%1%M25}<8+ bx?:f%~F^I0zuEQj[ *Mijx');
define('AUTH_SALT',        'Gz`-Ia@-`6}708_[w*Sum=aA1Y;MJ3BN`@:7$t|FRzt^w0@*MQ7gFwR2qTC];#r~');
define('SECURE_AUTH_SALT', ':bE)`88v2qSh51)Bk+JO2DxF[UjfV+~4aLgp/G3u$7cumZ)C*fLPW;+8MLrU*:UN');
define('LOGGED_IN_SALT',   '@Zw,J[CcAAp+R7+m4l,-71?lY*A7R%!LW[LshqklBv1~6qC 1Kg1MaZWF-5j|,4?');
define('NONCE_SALT',       '4W)c7nEdnBz[6 qMW.RwGwi{B -PzeDxQJ%EO|^[;UEk-ZZ{??fbs!Q^C}5 ,j{%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
