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
define( 'DB_NAME', 'abc_clinic' );

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
define( 'AUTH_KEY',         '3c=Pf4kep~EmDU;:* X[z`taP+iP#Ja[ZuK>~fz,aGufUY-E*,&gwqrO~Mbya8BI' );
define( 'SECURE_AUTH_KEY',  '?6D*Qi)I:i4BJs!2BA~:fA{FHh-:v[g|P).G4A|~V!O|O%d1K3bg&DZv/)zgh,V3' );
define( 'LOGGED_IN_KEY',    'mT,+w_0;[K2vikASCocsFScxuIJ+*FgnX`v}=W ,d?Ec8PDXu0#tNbR>GZ0iw=aD' );
define( 'NONCE_KEY',        '.Qz|5>>%B4 _6LAFi!LQT-GQaK!C[)@Dezo0YtP<##}:brHix)[UG6CVV#td4BQO' );
define( 'AUTH_SALT',        '`0:rSk<}Q<n]rsEGj_`?<*Tp=~vJ6]|a+#X#^[SIR*FjKwMj].Y?r7vR5@XV0T++' );
define( 'SECURE_AUTH_SALT', 'yNNmwdZ:-G;h(W1P.a=*#h`V%vq_C F{$!u^5hdKUt8pLn>0NaQpV,LH {dy0]q9' );
define( 'LOGGED_IN_SALT',   'muY3Px<y)/W@vtw8$,[?V9I1kknES*/IT!P/#Q!O+nB1;B.hFx<ryFX+hE8oMa!X' );
define( 'NONCE_SALT',       ';)-SmH2((quN9P2i, 236+8*O.3>a?2d: sn-?={#VuBCMvcm>Xr<.Sp=?s/y^l}' );

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
