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
define( 'DB_NAME', 'manage' );

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
define( 'AUTH_KEY',         'QW<Z,{Y5l^]N~ovf(h~@3-j~4bm7}bud*JG[?8K,ny}uQ8TNb4DmeVU><-=7x0<~' );
define( 'SECURE_AUTH_KEY',  'GKfyVvM`H1%m{#bV#~}(n7kNG-4+$>TSaj2[ub0UV]*C-Yp}esUS00u)1=HYpe}R' );
define( 'LOGGED_IN_KEY',    '+&tr#PGB$WcJ<E8ebEr5&L0V2I-IdW6u%cw9D4%Nq|+9F1&i)RvfIm2GnIbro]q(' );
define( 'NONCE_KEY',        'a@ozET)uR[2<[ONgFMxnVwIoVI.:Zl<i#%ae2C=<gpa=qf_~2Rvjq+ tji$Z)j~v' );
define( 'AUTH_SALT',        '>GZXJpzn!]34?HtSuU/wphKu=$=DDZj1my#4~K{A@+=v(hDzAp0X+SfY1}@CmDI&' );
define( 'SECURE_AUTH_SALT', 'inyOcTL<MZw~<9q< {o*LC>MD7{3<#P@CF-*VF7tYTI}#/wG_MNo=|vtAcU4#!R/' );
define( 'LOGGED_IN_SALT',   'R;i:FQ@LGY6`4I@jEX/5oWfI*)D{cE2lavp;;Pt7t~MWgtt;u&t8A-vAV[L<PG1@' );
define( 'NONCE_SALT',       '7f@$(L=KZl=L3vzSQ4l%bwI+.R$q}wWRW}a,1rkhv*O]+0(6;e#Zc)CGK2KGLnb>' );

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
