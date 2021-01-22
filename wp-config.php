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
define( 'DB_NAME', 'wp-starter' );

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
define( 'AUTH_KEY',         'sq(bzN*Ch0Wi&MkLjFjM4rmrvLbHS8T]hX#ET`Q#jGT,epU+0$cy-+-j>eEPc}+|' );
define( 'SECURE_AUTH_KEY',  'G&6Xm=+3;6}@I$K$8f%|a*RGMAnM5cSnfP]-16!,M8.VjF)1r_q~/z],Jn;{ZKMJ' );
define( 'LOGGED_IN_KEY',    '-5!A!C;z}uMp$ekFD e6diR$xV0JYwn._=5:NO]VLJ/5cF;HV@;Up!(F~gcp}z@M' );
define( 'NONCE_KEY',        'r*-;U%`NUzuX:3i_Im+YT)Xz$OyrqQxvwM`I75:PC7Jj d!=D0H{Fr[ayDSzfM!z' );
define( 'AUTH_SALT',        'kV.@ba%Kcqb>Kwt8$%7R.6EhN*A!1}i)i[!/@vma(H?r,vyiE?=EhGu4v2b3l&VD' );
define( 'SECURE_AUTH_SALT', 'BIlp.I$!)o3 WQjwuh5ATf):AP_C6HjugBY.pxBImNn)m4y{8/HG=:_nl[7tnn;m' );
define( 'LOGGED_IN_SALT',   '8KU$IBy l<l[l<j4cH<f#]c&2MCGsc<T6.s:#A}WQf2Y%1U^af$D0.y(md.[?a1A' );
define( 'NONCE_SALT',       '59Cp/<sh]2>Z%;om=kvPxCVBh!x2iP&,}Sn=Rvb$;>L0 5l_)liiibZP3jeJd,lD' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'table_';

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
