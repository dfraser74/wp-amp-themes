<!doctype html>
<html ⚡="">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

		<?php do_action( 'amp_post_template_head', $this ); ?>

		<style amp-custom>
			<?php $this->load_parts( array( 'style' ) ); ?>
			<?php do_action( 'amp_post_template_css', $this ); ?>
		</style>
	</head>

	<body>
		<!-- Start Navbar -->
		<header class="ampstart-headerbar fixed flex justify-start items-center top-0 left-0 right-0 pl2 pr4">
			<div role="button" aria-label="open sidebar" on="tap:header-sidebar.toggle" tabindex="0" class="ampstart-navbar-trigger  pr2">&#9776;</div>
		</header>

		<?php $this->load_parts( array( 'side-menu' ) ); ?>
		<!-- End Navbar -->

		<?php include( 'post-meta.php' ) ?>

		<!-- End Fullpage Hero -->
		<main id="content" role="main" class="px3">

			<article class="photo-article ampstart-article-content">
				<?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
			</article>
		</main>

		<?php do_action( 'amp_post_template_footer', $this ); ?>
   </body>
</html>
