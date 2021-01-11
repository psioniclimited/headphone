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
define( 'DB_NAME', 'headphone' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'myxa-A4QNc>^!tva#oUAJ?lL>S=-bR6ugCvAvIARHSmY_w+q9`%+2z*Qe5%}VZU|');
define('SECURE_AUTH_KEY',  'X6+n|-<.T[ sY~OM~)?=VS1c&Adca;aO?3,i >j|ak~oZnDH|4!pqF;5!%xtxElO');
define('LOGGED_IN_KEY',    '++t2<s:i2@scF/E;9;E).XHuEg&e~*VWsn8VzHjMT=%cH|~*,U |61WSAQ)J2Apw');
define('NONCE_KEY',        'rL,q$dsw=,k8I4MJ/Z_%{Aku|]pae&Ko$)*z!(jq^jkLgq+.B-WFk<mv%HAL=uTD');
define('AUTH_SALT',        'ehc%b +1.q]@<u5j,8]4j;X8IM7ecx@[U4-)FG3{XyyadI/z,xI-F3i:B9?k]NC7');
define('SECURE_AUTH_SALT', 'c:{OCmq[A[,1a25*.%JM+eY.dA)5Zfz/}5OH%--4m-}?3>^QD`mr(;|,|.gcgvh,');
define('LOGGED_IN_SALT',   '{<|.)s7KH8G@>_)!e/39odtn:TS7 -y&||> ctJ4|0#KMjQ(80Yll>eiEFJ+/t|2');
define('NONCE_SALT',       '-=_1]]-b<}F=%<X:|o[t<^r1f~]se@-4a+hN5;|d*Avs_HoBC1+P@|]au-m{1+9$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dbhp_';

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
