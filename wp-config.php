<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_leaderboard' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_]IM6eJ||VV+G{X:U#]6^Ayl.|h!5R$T-Ws6-H@&;ctn/GEZ]q5|9 G|1*:B!,t)');
define('SECURE_AUTH_KEY',  '_0:Apt``}+@y:z9e+YajB+tcu=01JXXt(&I4(aTog:ASf_nK*;s_JJ0Sl{J$0`0r');
define('LOGGED_IN_KEY',    '40gM{/}KRqt x/C+PsN!u<j-z@%~[!Ux5w8(u&,>k/.J+z;1@1,YXu#PsvQV:.Hr');
define('NONCE_KEY',        '>$qKiPhcqG4@#Bz;J85CK; OKROaD+oN[W04Z;z`E]2?[s0YzGVp+rUk.8!FbE*=');
define('AUTH_SALT',        '29za1)vZ_@_x$coS+*YF-wt31 1 +U,L3J&g+RT6J)TgrL=?k[}p`8Q~?4dd&Kh|');
define('SECURE_AUTH_SALT', '`xkT.ELN-{)-H/C!vlAVzQa&$vh/(@1Ik(_%x8nqfQx5$tN`^pl4<osBjIg))8kK');
define('LOGGED_IN_SALT',   ';&OK+D56<VvCg2l/u6r O}NYlou]a`e`Lm.K7{iBA|f9 L::biQV+@C0xuKq{/,t');
define('NONCE_SALT',       'Xi_1E3=M+9?D*a<)LcMT=!@/6?E!CQ 7bP9I$3Wv}Fooqd9hZylslU|Hp&<(7RbF');

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
