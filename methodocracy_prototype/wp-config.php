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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'root_wordpress-trunk');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',%.P|E$^b~RAhExBT|w=tO5ZHj`NM(moFqd?9yH$Z=_VPHxklXq ,z=4c*)S7h}}');
define('SECURE_AUTH_KEY',  '@tx|&)!9ag5s MfMN0f/zWvmW&=o9j|_gR4$m055rw)H`g?;=0auav:Uk|N0;8A|');
define('LOGGED_IN_KEY',    '2/HXdvx @ye5MieLxbr+bzG^SG4T~>7_@zwZ@o*y%2xo$]Z@YA*<~fNjqUS /o_n');
define('NONCE_KEY',        '.Bvj/yP.WhDN=aL<<!5$bfR@n/UByjD?X:@:W6F}pH`Y,@a{b`B)T9[NHJx&5}Pl');
define('AUTH_SALT',        'i0:u9ZhGtvAUMcB<|5$i@47[xu@3@9k=y@,T8T90RvgS ;.o8U3VfR7fyf@E/o0I');
define('SECURE_AUTH_SALT', 'Wi>:3c$PfY1(QT}daeoLWLw+ p<jS/>]&nhBBHMu[=ocO1-Q/rpOh1D*rb(CLqSJ');
define('LOGGED_IN_SALT',   '1 6n[~.~4n 7ju2rcU*t=o:SM]eICKYD!S/mg#-KSFv1Zh7{yG^*.D>i=zlX{q8a');
define('NONCE_SALT',       'V=k%puKAnUY-z^pK$K{qkNV$l7th={no(~`fS;e5JGLyupfPN+X/o&onREPjW4At');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
