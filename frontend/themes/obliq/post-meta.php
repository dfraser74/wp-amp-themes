<?php
	$categories =  get_the_category();
	$post_author = $this->get( 'post_author' );
	$date = date_i18n('F j, Y', $this->get( 'post_publish_timestamp' ));
	$url = get_author_posts_url($post_author->ID);
?>

<header class="ampstart-header">
	<div class="ampstart-header-obliq"></div>
	<div class="ampstart-header-inner p3">
	<?php if ( $categories ) : ?>
		<?php foreach( $categories as $category): ?>
			<span class="ampstart-header-category mb2"><?php echo esc_html( $category->cat_name ); ?> </span> <br/>
		<?php endforeach; ?>
	<?php endif; ?>
	<h3 class="mb1"><?php echo wp_kses_data( $this->get( 'post_title' ) ); ?></h3>
	<span>
		By <a href="<?php echo esc_url( $url ) ?>" role="author" class="text-decoration-none"><?php echo esc_html( $post_author->display_name ); ?></a>, <?php echo esc_html($date); ?>
	</span>
	</div>
</header>
