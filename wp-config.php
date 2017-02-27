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
define('DB_NAME', 'wpbasic');

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
define('AUTH_KEY',         ']0Iv4eF#[TJM!?)|i;`m:FI5<?ze~:VYe$tM}2?fM3LID*5)NJq:U6iDRE!Xl|vF');
define('SECURE_AUTH_KEY',  'q3$n{ZW:cbaY7U|6|;K)7%n(q[[5$vA=%O3Zz!vd~7lANVb?nhT4*&7<Hq0!?-Z/');
define('LOGGED_IN_KEY',    'a~~9!9(1^KPt]_`8!Y=kiwo2@99,a#&d9.s$Z@d(?Y-@9<oQ#?Ln6F$:iu!ms/(-');
define('NONCE_KEY',        'UV_-zr;oIFCL_u<xghyi}c/T(7O;-8LK7x19<E:%G&ge0jvN_~|NO:nKZ0[!Nuc4');
define('AUTH_SALT',        'K@FKpfXWRs[|~=DM$R_vg{0;sA[%B vf`228h;f;h9U9gEM.8?HuT9::xa{rLzZ=');
define('SECURE_AUTH_SALT', '72>PX{LdmZ<Xq#u6lLsE,b^;rB}|C*eWHibuImaVza6Mc,0{xu4}n*6s%+^)g|ZH');
define('LOGGED_IN_SALT',   'Ic4[Nv0X30a*&`7g`II|o@&JKK-!O:^;x(TQLNvJF)U4;Q&99Ao8~lS0k+l!{g]V');
define('NONCE_SALT',       'srSi3?5ft2y,jvzH^Kh3 c~%8h/iFn9m9`l`]{A}BjQ>lQc$g*ki!NvPMu#9/N.E');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wmy_';

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
