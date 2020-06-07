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
define( 'DB_NAME', 'new project' );

/** MySQL database username */
define( 'DB_USER', 'admin2' );

/** MySQL database password */
define( 'DB_PASSWORD', 'anchal' );

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
define( 'AUTH_KEY',         '|%#aLI,Jrt(P3r4EGg/R}[HShui`=EhNWeQL,S28DBzj.q3U(F# ;YU^.Ds7wK#e' );
define( 'SECURE_AUTH_KEY',  ' IPDL6=&u|9E lBn&B:mM*afa-ZI.m{*PXxV~TYtRC}:eA1j8TWZL<#n,3zW}8?<' );
define( 'LOGGED_IN_KEY',    'd8La{oP0_F-YdRh1]8K7n2`@wi8=C-bZuuQKB!t&N5T*f}fGUO*cNTM.#4A-Zt?5' );
define( 'NONCE_KEY',        '.-fQ8bS{Z}ont2}m0gIy$&` _UO eV?{C:cqQ_tL%]E+@},(!:(Q_X.`{H+?5fr9' );
define( 'AUTH_SALT',        '9**VtnuXrRVDFyDM-phc+0 97q`8$LB ?FM!! g^uB;qsZQHq{_pBp.2mmOD07q)' );
define( 'SECURE_AUTH_SALT', ' AD%Z`i%7>*ewT4Jkntqy;JmEI!X=Z]57GpCd6( 40wGCeXiu*gS8|wwh`iAdnjv' );
define( 'LOGGED_IN_SALT',   '_Dm21q`oO4?L5]H_K8||6p?IQjkY&Y>_vbG<X2LQ{J+U53Ui:>i,_QH%!;pF@+&g' );
define( 'NONCE_SALT',       ';PKQZ]d3ciK5rF3%h=uK3U,2=Zm)@]InLISGc2-!WGL+SQnjB9/ EjiBh#QXA();' );

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
