<?php
require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );

// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );
	define( 'DB_NAME', 'portfolio' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', 'localhost' ); // Probably 'localhost'
	// ========================
	// Custom Content Directory
	// ========================
	define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/portfolio/wp-content' );
	define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
}


// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );
// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define( 'AUTH_KEY', 'zs^Ov-#J2-eG$KAHm.SArXs!2QtT9m/`3}pK5sF:#7?lR!tYJXVf6#SKi^lc,f7r' );
define( 'SECURE_AUTH_KEY', 'XUxx8LD{+ sw}#q4aAzq-&u(G<5X?*T3y0K9tg)>B_lUL3 pR)hLrp=^Ai^ GOVn' );
define( 'LOGGED_IN_KEY', 'T3 ;^r[GtT ^EU>L-NII&5`jCF59p}Rxq&h1o9+#8B{lbqG-BV+<c0+bt#hTV>eo' );
define( 'NONCE_KEY', '1cn?!@:E~ptm|(}zxz*I:,IB-p%YYaZ}abD&3B7fMvJD,6Tm+a=pc<Mehb1<r`dB' );
define( 'AUTH_SALT', '*|6(:X[_Q[f6Lr?N(Db=FD5*_zl0lNt0^wI{r2H2PLNk{ev8 uSO(ny/mpy-uXdv' );
define( 'SECURE_AUTH_SALT', '|dG(aq4hKGseU,Zf(ifoL/gZZ2X%P/W9_YU_uLc_+h82b:&V1;_+saOPef)<2z{m' );
define( 'LOGGED_IN_SALT', '*N9tE-:^/,A9~vk(`R5f^}lUP&@smjK[b*eYD&Xx&gHejYq~+B+`|+Hsh+1%ARh`' );
define( 'NONCE_SALT', '8Z2P+s+^5RYGY:UUVbgl7b#+8-gG+OXe~jjz9scc,F|-*R@-=tKqlGUkD&fALK|&' );
// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix = 'wp_';
// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', 'sv_SE' );
// ===========
// Hide errors // Uncomment in production
// ===========
// ini_set( 'display_errors', 0 );
// define( 'WP_DEBUG_DISPLAY', false );
// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );
// ======================================
// Load a Memcached config if we have one
// ======================================
/*
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) ) {
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );
}
*/
// ===================
// Bootstrap WordPress
// ===================
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}
require_once( ABSPATH . 'wp-settings.php' );
