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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'aglbaby' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '_Cd&~Gk,^s`0AoUxWS>jv!_FVyuf9kfkmGR{C*.ck-87OEy5QRAu8A$J4Zl-)G=E' );
define( 'SECURE_AUTH_KEY',  '*?oVUJ(hEoZ9aLKkwGdoHTclV<%Pp$=kXAib[%{AWU46xm&H1xs*U)0a_0t(!z.4' );
define( 'LOGGED_IN_KEY',    '+Gn:%GMwC^#*d]bnX3AFe]90^L+Dq?c*k:>OIdwH/;%4!aNG))HMWYXB}twsFr|2' );
define( 'NONCE_KEY',        'VD|lw.HiYk<[PequO*@INTt+ox]2aG8g1UOa_D)IRxdk%*FQw<xO8|_<tR<N(@]3' );
define( 'AUTH_SALT',        'lZBgL:?EF|S:^#=|TZ=)FSwLwb-z~WL{8XV4F>UA]T@/@O3B(P+BlEa?0|&M)*73' );
define( 'SECURE_AUTH_SALT', '[lT9>;|I#7W-lV5nLfkRG1?SByz%&}mU{/]&[wAjE[dp]d+TPP<3ZC)p@{ }D#n^' );
define( 'LOGGED_IN_SALT',   'HH6%>mpDx2kwD`8EvewiL,aD;&AiTY5_;|6+b9KLF#WfV1cv2uQ ]z5d-7+xzc6(' );
define( 'NONCE_SALT',       '<@I95vQ+S)1j0#WC*:MtC&{$h?_q3dPvC>|@{aGIp$g9>Lxf^D:_!m=]MdZzTrPe' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
