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
define( 'DB_NAME', 'ksCouture_db' );

/** Database username */
define( 'DB_USER', 'abcom' );

/** Database password */
define( 'DB_PASSWORD', 'Konate@2024' );

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
define( 'AUTH_KEY',         'JHY5[,DAR1U4Ke0/LW9i:hWC(];)ct8FFp:;1tH.MkbzxNg_23B2$[R,Jj~jr1)C' );
define( 'SECURE_AUTH_KEY',  'Tf@Ndm:oDRJ.uhDkb4`;;;+BJ,8GSwVVU}E~5Lt:Q9PX.ZJ6kK=3,s!C]T,8Ei}(' );
define( 'LOGGED_IN_KEY',    'Ba1s[-_|0(S-|t<<-C!!YplBH~+NxySP{$h1+cdet0OTO>tA+&H>30B)E8(bme|%' );
define( 'NONCE_KEY',        'HnG,ir%|)c;HLm4q.v2pEHw`ido(M-{H[?<<r(9; )f->[7!1uis8Nb_6&?0w/6v' );
define( 'AUTH_SALT',        'CwChn$w6Y5ro5M,}t45,s|s/_GK{/crz7Bz0S+T,0QYun5Cseiy:=3n=bWF g;<<' );
define( 'SECURE_AUTH_SALT', '*FH/uUA5-6ugpW8DDA1I7DP,ijadq,q_#U,C2YJP0a{HFvoCK]-F%P&&ZH*K=eBk' );
define( 'LOGGED_IN_SALT',   'S8%(6L?d!xRfD,Ofkfl2VlXV9 wB95ZvL409:~$,{?Jd/`-8U13,XO0DU]^OPeX)' );
define( 'NONCE_SALT',       'L#yrdF9tG OGLTrDBr0H$;*e`h<z>QCjX4{/Y$v!x-ni}qiZ]{j,BG!/8za5gu26' );

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

/* That's all, stop editing! Happy publishing. */
define('WP_HOME', 'http://localhost:8090/ksCouture/');
define('WP_SITEURL', 'http://localhost:8090/ksCouture/');

