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
define('DB_NAME', 'blooom_beta_local');

/** MySQL database username */
define('DB_USER', 'garyarnoldseevers');

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
define('AUTH_KEY',         '~NN}QZ&f^0<dcXr|W&(-j8AxNPUEH*Ma/^bjy(ZC#*$-37K_U`kuAcI ZknfSo/$');
define('SECURE_AUTH_KEY',  '8c<d)f1w/.|FwFE8ws%Rc)07nG9Uqeb+G)se{&hi0LZf.F=-J@U64/Oog2EXmBxd');
define('LOGGED_IN_KEY',    '&JuLB%eeDgY6[eOTqUGctuxnk(sJHHxu6NP_?t,gs.O>5|E&8dle?;t$&}hmq>)G');
define('NONCE_KEY',        '-I2>M]QtmfzP{Q11?Igf+wp$.TB9}2P1>lbEu)~JO,AJ|Z64KYkCf;5^Q2N`0P<e');
define('AUTH_SALT',        'x@%_{Z(bW;$Ds}*}nEIW!3Y<},vP!Fve+m,Rgi*6IqK6_Wj;V|X6Cqld!c6Yy8Et');
define('SECURE_AUTH_SALT', 'i1IRB6$/%J#wc/=G1S2>!H!!E-CuC-5-CH^[qf>,i~%7wRKKz(z7y&33Nr{v-r*1');
define('LOGGED_IN_SALT',   '{l<@DA&,sa6U$W=9d$)q1&=%E^h=pLs57;W* :aoe(*H(!K^2e.]tMICA*7 6_S4');
define('NONCE_SALT',       '_Fm/@~im.)TgYUnGF{l<R`=HoB_x4aoZ:,o<O{}F3BX0SuJH(HOi{}5U9!E(FU];');

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
