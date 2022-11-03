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
define( 'DB_NAME', 'sporty_last' );

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
define( 'AUTH_KEY',         'fF02r&7%0t^=@YB#x]UW1266t}~B{`O?S`+ZGP%6UD=$vZXr~g}eT&r^f(+5t>)_' );
define( 'SECURE_AUTH_KEY',  'e6B!#O=|S?L1/cyULea!=|r2Nb,Js{C]z{QG!.=V(EF0iI!,%+|D`FT*U>;G:{Yz' );
define( 'LOGGED_IN_KEY',    ' j^h8ABUJ8s/`dNgg*F|CArsaaH<}$PT2)ai#^<wE/@Hj2UMnf=[J~uuBDfp2.W2' );
define( 'NONCE_KEY',        '/^*4vqI%Kiv0#<!{_;yE#D<CN>2;i>ueK{{DmgW;=S-Q[hol ,RD+tX;yilI`#`A' );
define( 'AUTH_SALT',        'p^8cM:LI9JOkmzp3B98|UZKw`T$@EQ~F][s~k`CV,W4bbV0wf&dcxF{$Bn$D}^]:' );
define( 'SECURE_AUTH_SALT', 'RdR1ZlXo~tss,~PZF_oJJ]?5]Vi)uxZ;4fQG-5:=bO2,x9b2e0k{FYFG+w47rmpQ' );
define( 'LOGGED_IN_SALT',   'KB19CF[#B]j`Bpl*o^nvNH[r%8Zg whPTM[$nJjj0=.Fu4Sf4 R];KqJ@gLs.RZG' );
define( 'NONCE_SALT',       'gshbXwsZ,Y(llzY[3T~}PpL@B&ld>JO/mWT- bE{EtyA@^V {qQnP)m>ICM^1+R ' );

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
