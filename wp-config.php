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
define( 'DB_NAME', 'devanshmathur_db' );

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
define( 'AUTH_KEY',         '5RD9-fj!h/T/Af+BR9Kh8p0}+;25vThH<bbblv7W`|E8|L)N,cpHFxWhO?!Xovbq' );
define( 'SECURE_AUTH_KEY',  ',^% Y91d$C7R^.{l_<-!r#9@E<O6VDLs`2^jZ;T ddL)>qwt8!)E0*Xe3sZGv}C@' );
define( 'LOGGED_IN_KEY',    'P[5)9-u0|-<)5.b3C*,L+T.)/r$Nk2Ek}!{nO*@!/pz#p*-PU),)q=mB/^A=YFX{' );
define( 'NONCE_KEY',        '!Hh;WdGRlT}zB{B5DdlyZ2U?7yk2yz*#w/VH-qxW&N%Y;q7r&XTc@:,$8CoGO9nv' );
define( 'AUTH_SALT',        'gubYFe$/Z(6)p~944(:-}xGW~a_Rf31s~_?{@kCxdcKt|V$>j!jW1]&u44W0}0Ww' );
define( 'SECURE_AUTH_SALT', '6;{/VXxC3aj;w=bEhxle(:wwWJ}$>mCpkaX4O{/Q#a9.aYIzw:6NlBN4SS294%EC' );
define( 'LOGGED_IN_SALT',   '&9^?zt69|%~-)K+$C!XJcrwTp$fL`&<#USSb6J_S#x@6EJHn_*Yoe4mXO}?6M<QF' );
define( 'NONCE_SALT',       'r;`c@aJ3)m}c6sUF-o5s|n%4vLQlZx:%-C1qj!H=&?O{6QzykM7HMw73=r(yITc4' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
