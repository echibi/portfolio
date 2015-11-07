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
<?php
/*
 * Get top-level categories and list them as buttons.
 */
$categories = get_categories( array(
	'orderby' => 'name',
	'parent'  => 0
) );
if ( ! empty( $categories ) ) : ?>
	<div class="filter-category-wrap">
	<?php foreach ( $categories as $category ) : ?>
		<button class="category-change" data-category-id="<?php echo $category->term_id; ?>">
			<?php echo $category->name; ?>
		</button>
	<?php endforeach; ?>
	</div>
<?php endif; ?>
<?php get_template_part( 'templates/page', 'posts' ); ?>