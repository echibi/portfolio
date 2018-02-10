<?php
/*
This is a sample local-config.php file
In it, you *must* include the four main database defines
You may include other settings here that you only want enabled on your local development checkouts

Rename this to just local-config.php when done.
*/
define( 'DB_NAME', 'echibi' );
define( 'DB_USER', 'echibi' );
define( 'DB_PASSWORD', '123qweASD' );
define( 'DB_HOST', 'mysql' );
define( 'WP_HOME', '//localhost:8080' );
define( 'WP_SITEURL', '//localhost:8080/wp' );
define( 'WP_CONTENT_URL', '//' . $_SERVER['HTTP_HOST'] . '/wp-content' );
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
// ===========
// Hide errors // Uncomment in production
// ===========
ini_set( 'display_errors', 1 );
define( 'WP_DEBUG_DISPLAY', true );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
define( 'WP_DEBUG', true );