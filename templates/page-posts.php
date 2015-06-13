<?php
/**
 * Created by Jonas Rensfeldt.
 * Date: 2015-06-13
 * Time: 22:12
 * Filename: page-posts.php
 */

$args = array(
	'post_type' => 'post'
);
$posts = new WP_Query( $args );
?>
<div class="posts-wrap">
<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
	<?php get_template_part( 'templates/content', get_post_type() !== 'post' ? get_post_type() : get_post_format() ); ?>
<?php endwhile; ?>
</div>
<?php wp_reset_query(); ?>