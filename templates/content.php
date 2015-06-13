<?php
use Roots\Sage\Utils;

$image = Utils\get_featured_image_src();
$inline_style = '';

if ( ! empty( $image ) ) {
	$inline_style = 'style="background-image:url(' . $image[0] . ')"';
}

$show_link = get_metadata( 'post', $post->ID, 'show_post_link', true );

?>
<div <?php post_class(); ?> <?php echo $inline_style; ?>>
	<?php echo Utils\get_featured_image(); ?>
	<?php if ( 'on' === $show_link ) : ?>
		<div class="caption">
			<a class="btn-readmore" href="<?php the_permalink(); ?>"><?php _e( 'Read more about', 'sage' ); ?> <?php the_title(); ?></a>
		</div>
	<?php endif; ?>
</div>
