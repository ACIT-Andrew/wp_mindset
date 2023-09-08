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
define( 'DB_NAME', 'mindset' );

/** Database username */
define( 'DB_USER', 'andrew' );

/** Database password */
define( 'DB_PASSWORD', 'andrew' );

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
define('AUTH_KEY',         'iTU$:sklP]j)]]jv|o^L3EZ H#B?P*/+o|rX#8)Ir3Kp]S6aZ ,x0/(_<R|s%^%l');
define('SECURE_AUTH_KEY',  'H4+nisf>B=5-Ta,]3+tt91+wMA5=Vd_CAPAS.ifC11pf-.y=99GQ]5DL+n]IP5|[');
define('LOGGED_IN_KEY',    'S8p2]PTo2D8b}b|x}ABBk8:&`>|wX[m6rk^u+>(Q3[5qp--hfr^Tq)Ex8fLH9^tc');
define('NONCE_KEY',        'Zd^|kS@e}Wl|bT,<=qgh-x+O;bBL|ZO0FxT%nklh+q5;X^jPcJ6TyITv}wk`S2I0');
define('AUTH_SALT',        'E_Q#u`<NuXoT0aUf]RsBR?0X42JV&}`C!:R;YdD%8/K1yJ>3n{k6@n&X974FSy2;');
define('SECURE_AUTH_SALT', 'W-.P^:nSi*I%b(uEQCE(;oWP(i1?O2?06.$j6s5 lq@bgi@=NwG#0uR gGlmEPq|');
define('LOGGED_IN_SALT',   '<x9H6z(EV1^1^Y.2j2&UQ41OUi#JC Ss3q;1J(Lm5w9MgD^mc|<&I=p`BR:FX[[*');
define('NONCE_SALT',       'i&n&xPBAwJE$fUu:|RL>/h6X2L1!oBeKXY]L=- 3/+?Yz?>zX`^3ERTEG]8krV&|');

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
