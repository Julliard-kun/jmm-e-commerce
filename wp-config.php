<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'jmm_ecommerce' );

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
define( 'AUTH_KEY',         'lXd9E}r7fVzS5^t{OfGk5cFtueZL!tKj/&aZ%`#l~a~k^L.gaqF?}f%ecBi<!O@D' );
define( 'SECURE_AUTH_KEY',  'G,=sFRbZzTWm&n<SW#^y}W==j`UmUB]T{~wNQpc~5WbQC8,Z/k=992h$Ox~DdyZ~' );
define( 'LOGGED_IN_KEY',    'z!ss.foCXZ*qbOy{%/!b{W=eZi5-aeZSs59-mdLG1qW@m#lF>tx]N83PPlc!L+2.' );
define( 'NONCE_KEY',        '(:6C!+Pagvq7E,*MzlQLstVzhG#eRLhTpbf|S.0RF7NnCSG|4lQ,&gw:bv|Fs}_E' );
define( 'AUTH_SALT',        ':#cM2kHPug19l=5T#aNfArMul-9X-R)=gYKI@E@Oj}-1,]&JRuv;Y=@|~b;,;X@i' );
define( 'SECURE_AUTH_SALT', '~G.4Z!S>L~W8H_8y:FZhQ[3an{F?gbWPF`cu[#pB=ui8C0]o> G6&rj,xSTE;Ip5' );
define( 'LOGGED_IN_SALT',   '=fb^nII[9qBnN<FS2~e?NrIVf[OAL#b6~jKUJQ@>@%1+*4d]_p1A]h3sLb7|ewI]' );
define( 'NONCE_SALT',       'bZyKuxV<s|?(D8Sy!pF5LTuq}$c]PGZ.xT+$bXc;;Wi13Mf>3@(<1#zLTTP5&Rt{' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
