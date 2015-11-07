<?php
/**
 * Created by Jonas Rensfeldt.
 * Date: 2015-06-13
 * Time: 22:12
 * Filename: page-posts.php
 */

$args = array(
	'post_type' => 'post',
	'status'    => 'publish'
);
// Check infinite scroll page.
$page_no = get_query_var( 'page_no' );
if ( 0 < $page_no ) {
	$args['paged'] = $page_no;
}

// Check if a specific category has been selected.
$selected_category_id = get_query_var( 'selected_category' );
if ( 0 < $selected_category_id ) {
	$args['cat'] = $selected_category_id;
}
$posts = new WP_Query( $args );

/**
 * If we are one the first loaded page
 * We want to add how many posts we found
 * so that ajax knows when to stop trying to load more.
 */
if ( $page_no < 1 ) {
	$count_posts    = $posts->found_posts;
	$posts_per_page = get_option( 'posts_per_page' );
	$max_pages      = floor( $count_posts / $posts_per_page ) + 1; // Add one since we already are at page 1
	$script_params  = array(
		'total_pages' => $max_pages
	);
	wp_localize_script( 'sage_js', 'frontpageParams', $script_params );
}
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