<?php
use Roots\Sage\Utils;
$image = Utils\get_featured_image_src();
$inline_style = '';
if ( ! empty( $image ) ) {
	$inline_style = 'style="background-image:url(' . $image[0] . ')"';
}
?>
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class(); ?>>
		<header>
			<div class="featured-image" <?php echo $inline_style; ?>></div>
			<?php #echo Utils\get_featured_image(); ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
			<?php get_template_part('templates/images', 'list'); ?>
		</div>
	</article>
<?php endwhile; ?>
