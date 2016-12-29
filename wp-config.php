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
define('DB_NAME', 'son_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'XqL^fIb3d)np:Ca#DJpq&#L.Pub;d}/gB~ue%A,iiBe,-([3+T{]LhAYm|~4`9ou');
define('SECURE_AUTH_KEY',  'rDu|J1o<Dxc$CPEW~Ou7C:UD*}hI,dkYG0l>>_qURJ<5h5nUG4p!i}kCI;S&IkRY');
define('LOGGED_IN_KEY',    'DQ MJ]By8~+Eb8>BJ+ESN`m8W5r7%4=MTR1u+~%IsT,AEl(YH|.;^t)$iMwy21Jj');
define('NONCE_KEY',        'jic]Ry DKGrcNq~KoAn5xo3 K+n@QIf/W2aZlTW{Vl(azO)u/y+DVxKeNp!)ntaH');
define('AUTH_SALT',        'l&V=B,ex0[$&^!0epB8}qs53P%vp`m^h#5(EJ[aU,ZOud1 d!5RN2RSS@zMBcso%');
define('SECURE_AUTH_SALT', ',^=*+#QxDz{se@X8hN3Npu?.51JH1k!eoJx![LwpK[J3 rcg10G3MEIw{OmThG@w');
define('LOGGED_IN_SALT',   'H*`O3ony33H <s[;wbMikqnY}x(EDwdsP-Ks3{{(0{C.M^(^&BB>c>P`Q>;qEg/-');
define('NONCE_SALT',       'Hg2Y5gx] X|ggyd&d2cG$EW6k9]ahvnqgY@+{y;wJNH/gGU62b&U9p_`#Kt>va&%');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
