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
// define('DB_NAME', 'fixxstag_boustead');
define('DB_NAME', 'fixx_closet');

/** MySQL database username */
// define('DB_USER', 'fixxstag_admin');
define('DB_USER', 'root');

/** MySQL database password */
// define('DB_PASSWORD', 'OogS2[.9mi)&}tK9');
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         's:K3&odpyTogKku^!rFha0u]#$.^){TB!eYL2?D!TO:KGszHs#KQ)_kI0Xro&4h[');
define('SECURE_AUTH_KEY',  'mXWji7oaZhWg+b 2x_0!z tHK2NpPe`Jb]F O=QPXV0k{:d^K~EAfYI6|tP6QC1B');
define('LOGGED_IN_KEY',    'G,I7ZUp-6LiKKCd{b=2}ML+NzaL1&a)F~ zD715v#Vg-CD?@4L>gcEs Y*ywaYWo');
define('NONCE_KEY',        '-0/e:)D7&X*11n<2r[LGH&=H+$x${YP]0p[$)2L|-];xk6F4[#74Zq,(`$Ssal&]');
define('AUTH_SALT',        '/&bpORc]*r*X^`69W=i;ej9w|b)b8z~0;6DwA6RM2*SV-_a}zl=6P~o&#ll^)#L-');
define('SECURE_AUTH_SALT', 'EVEg__2c7i4ehCn<.{:OaH[Xz7v04Rs=:l(b6%R,9VT4a>ld`IOiqIF9:jatBM(8');
define('LOGGED_IN_SALT',   'h,|,fgpH>EJj9XOfWY#Vf:87 *FRYZnUW1y<RzIE_0@s#r<;3Y_%Yu]Z|mS==8 i');
define('NONCE_SALT',       'NUHDg_A/,1!#%h]>S8K+W{pro?)^h:>>5,B,B1<wqs@9#B1!lPv+!)>nUP16<W@x');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
