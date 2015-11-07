<?php
use Roots\Sage\Utils;

$image        = Utils\get_featured_image_src();
$inline_style = '';
if ( ! empty( $image ) ) {
	$inline_style = 'style="background-image:url(' . $image[0] . ')"';
}

$show_link = get_metadata( 'post', $post->ID, 'show_post_link', true );

?>
<div <?php post_class(); ?> <?php echo $inline_style; ?>>
	<?php echo Utils\get_featured_image(); ?>
	<?php if ( 'on' === $show_link ) : ?>
		<?php $custom_link_text = get_post_meta( $post->ID, 'custom_link_text', true ); ?>
		<div class="caption">
			<a class="btn-readmore" href="<?php the_permalink(); ?>">
				<?php if ( '' !== trim( $custom_link_text ) ) : ?>
					<?php echo $custom_link_text; ?>
				<?php else : ?>
					<?php echo __( 'Read more about', 'sage' ) . ' ' . get_the_title(); ?>
				<?php endif; ?>
			</a>
		</div>
	<?php endif; ?>
</div>
