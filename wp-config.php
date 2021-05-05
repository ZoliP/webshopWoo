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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webshopwoo' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'g7tqU#FYb[]y(Si9|sTDb9:yu4mD0?p=:75P^)lwa~Ay80<_xL?}di1t)$;{y*H`' );
define( 'SECURE_AUTH_KEY',  'krpWons*1ZbqS}}iX{>*2Z$mR`H9PoW!mArP|t2LZc]:xj{/OV5m_d]vkHS j4bb' );
define( 'LOGGED_IN_KEY',    'XO#[rf~1TE;]g]$QQSLgX{;_XZZvC@.c%LwL?u,3{Y.}NCGifqK]B2uMV6R<3.Ua' );
define( 'NONCE_KEY',        'k8eA-Uw^a0*jBGu}BhgkR+%9@}r#15FTOUmuG+X`6EnKDznvy=IOF4x*Q@Bhs5]_' );
define( 'AUTH_SALT',        '2AMA--@.:d^K;o51C4)+~8o*6AEKI(X64~C|vvyb0$+B 0%<e!T^2W{ZhjqN;@|,' );
define( 'SECURE_AUTH_SALT', 'K6E<OS7:ARlwHI13Jhr#u[ukknySYv(k1DZX!%dri/t#.Zm~c*q:l W%3Pyl7^)o' );
define( 'LOGGED_IN_SALT',   'V8vTI?n$SiPG2(](q]$Z])Ckt!58`Xt<W/m<lPQ ,#xU4(2Fd{tIVjCW/J}j;$>2' );
define( 'NONCE_SALT',       '-XH|$k<LY;+UD$>E`@+!XoL%{z#W9mb^Xtd8e@1%[l)Q[#?ezhEodbMo5K%voMZY' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
