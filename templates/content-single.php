<?php
use Roots\Sage\Utils;
?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class(); ?>>
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<figure>
			<?php echo Utils\get_featured_image(); ?>
		</figure>
	</article>
<?php endwhile; ?>
