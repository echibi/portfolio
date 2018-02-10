<?php
/*
This is a sample local-config.php file
In it, you *must* include the four main database defines
You may include other settings here that you only want enabled on your local development checkouts

Rename this to just local-config.php when done.
*/
define( 'DB_NAME', 'portfolio' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'WP_HOME', '//localhost:8080' );
define( 'WP_SITEURL', '//localhost:8080/wp' );
define( 'WP_CONTENT_URL', '//' . $_SERVER['HTTP_HOST'] . '/wp-content' );
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
