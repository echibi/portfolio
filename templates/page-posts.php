<?php
/**
 * Created by Jonas Rensfeldt.
 * Date: 2015-06-13
 * Time: 22:12
 * Filename: page-posts.php
 */

$args = array(
	'post_type' => 'post',
	'status' => 'publish'
);

$page_no = get_query_var( 'page_no' );
if ( 0 < $page_no ) {
	$args['paged'] = $page_no;
}

$posts = new WP_Query( $args );
?>
<?php if ( '' == $page_no ) : ?>
	<div class="posts-wrap">
<?php endif; ?>
<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
	<?php get_template_part( 'templates/content', get_post_type() !== 'post' ? get_post_type() : get_post_format() ); ?>
<?php endwhile; ?>
<?php if ( '' == $page_no ) : ?>
	</div>
	<?php #$loader_src = trailingslashit(get_stylesheet_directory_uri().DIST_DIR) . 'images/puff.svg'; ?>
	<span class="ajax-loader"></span>
<?php endif; ?>
<?php wp_reset_query(); ?>