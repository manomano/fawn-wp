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
define( 'DB_NAME', 'fawn' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'secret' );

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
define( 'AUTH_KEY',         ',7LPC^w?ArZee_.zn}ao/E+]GwC^jLPp!$A@q]4Vnd4CKv+0A:N<c:t?]>#bfQN2' );
define('SECURE_AUTH_KEY',  '*Ya=)k5F+F<*ev5XgMj<22[KLIRoht9PO{bq2WYe)MHScY>@3K8< >@>CL2cq^o-');
define('LOGGED_IN_KEY',    'fJp.A$*VaTo$QpghK#dy@{!y8GtZYZ2IbJmsP|3&Baa$PCXfwZs-@.C5XqzMOO20');
define('NONCE_KEY',        'hL[L_0MWmj-RM@+c]Q=0.-]`iRo:>*HCVs-`&gTs(N|^T$N%wLI:tQt5;e51}v4a');
define('AUTH_SALT',        '_8Hd)yF92s6^df+ohggc5e?j+s< m4ROhkjfp;njD@#2gj+T2.m$-*M{Dx:M `<W');
define('SECURE_AUTH_SALT', '7YefuYH%dwUFs:J|LG5s)8pTZ}_T_2(P+A^/r`]-=Qa2Q`,9g93rkZ V%@OrP=IB');
define('LOGGED_IN_SALT',   'aQ0fQm-mUW;8;LI)Eg<2huS+)A6jdKp97xLC1FS)QzlEAE=j^EN6l0H/Ipy&6018');
define('NONCE_SALT',       'KQaU:R_FcB+DDKS,-G>#bSgV@G;2HiwYay}NZby2F]:=y*!gW|1O]kmIsC;;^#n-');

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
