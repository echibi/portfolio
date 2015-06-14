<?php
/**
 * Created by Jonas Rensfeldt.
 * Date: 2015-06-14
 * Time: 17:28
 * Filename: images-list.php
 */

$post_id = get_the_ID();
$images = get_metadata( 'post', $post_id, 'images_list', true );

if ( empty( $images ) ) {
	return;
}
?>
<div class="images-wrap">
	<?php foreach ( $images as $item ) : ?>
		<div class="image-item <?php echo '' != trim( $item['text'] ) ? 'has-caption' : '' ?>">
			<?php echo wp_get_attachment_image( $item['image'], 'large', false, false ); ?>
			<?php if ( '' != trim( $item['text'] ) ) : ?>
				<div class="image-caption">
					<?php echo $item['text']; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
</div>