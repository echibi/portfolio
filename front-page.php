<?php
/**
 * Created by Jonas Rensfeldt.
 * Date: 2015-06-13
 * Time: 21:56
 * Filename: front-page.php
 */
?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="page-content">
		<?php the_content(); ?>
	</div>
<?php endwhile; ?>
<?php get_template_part( 'templates/page', 'posts' ); ?>