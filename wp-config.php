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
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
	include( dirname( __FILE__ ) . '/wp-config-local.php' );
} else {
	/** The name of the database for WordPress */
	define('DB_NAME', 'wos');

	/** MySQL database username */
	define('DB_USER', 'wos');

	/** MySQL database password */
	define('DB_PASSWORD', 'h3P2BSIfXK');

	/** MySQL hostname */
	define('DB_HOST', 'localhost');

	/** Database Charset to use in creating database tables. */
	define('DB_CHARSET', 'utf8mb4');

	/** The Database Collate type. Don't change this if in doubt. */
	define('DB_COLLATE', '');

	define('WP_HOME','http://wos-wp.esy.es/');

	define('WP_SITEURL','http://wos-wp.esy.es/');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6H>HvJQRh0V6(*Sy()_^1#xKsfm3tqD|?Lm~,hkxN;d/}%}Th|b66-POgUoBWv+c');
define('SECURE_AUTH_KEY',  '2={(GWHrFWAP6GNo$C?pG~V*&LfI|sr;*qgfmuNaR3,g}_ sJu Y_ji8 iQ=bB}v');
define('LOGGED_IN_KEY',    '>o|9x!hBb_9*A~>ZLCD2c=@/ig`)XBh9OxN17T:n>K*piS@Q,W /d]MGG<]>`brZ');
define('NONCE_KEY',        'f>r^6W]Xg)RSb3.eR+RF~{kLGeFm{y*X6I4`!Rd.b5~}<Qp!ts8Vr~{g?HjT|r{Q');
define('AUTH_SALT',        '(R%k^@h@ Rc?#:j>{dUen49m{Xy]J&52eG`A$4H{N9*Cj =}S7v?ry|N~X6CM{w{');
define('SECURE_AUTH_SALT', 'z!KGV2(oAznL%- Fz=m#+J@n4r9Pe)&G0Y@akb@sZh^,Nf{g5x!.xct ^s(RMnSg');
define('LOGGED_IN_SALT',   '[ztOU2?YdAhTF<FNF7YN^Hp=4l0T9e}>`3vb?|MF~8{w[zddYF|3:Z_XSiun$z;z');
define('NONCE_SALT',       'CjLb[<H{9:U+d-6xoiSCLZ-X&.FF)@`YekY*9sMCP-OB  xGaevg+S`U6|[jWK<Q');

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

 define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
