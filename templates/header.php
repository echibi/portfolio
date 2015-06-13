<header class="header" role="banner">
	<?php if(is_front_page()) : ?>
		<h1><a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<?php else : ?>
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
	<?php endif; ?>
</header>
