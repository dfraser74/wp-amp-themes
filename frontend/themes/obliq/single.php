<!doctype html>

<html ⚡="">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">

		<?php do_action( 'amp_post_template_head', $this ); ?>

		<script custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js" async=""></script>
		<script custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js" async=""></script>
		<script custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js" async=""></script>
		<script custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js" async=""></script>
		<script custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js" async=""></script>

		<style amp-custom>
			<?php do_action( 'amp_post_template_css', $this ); ?>
		</style>
	</head>

	<body>
		<!-- Start Navbar -->
		<header class="ampstart-headerbar fixed flex justify-start items-center top-0 left-0 right-0 pl2 pr4">
			<div role="button" aria-label="open sidebar" on="tap:header-sidebar.toggle" tabindex="0" class="ampstart-navbar-trigger  pr2">☰</div>
		</header>


  		<?php include('side-menu.php') ?>
		<!-- End Navbar -->

		<figure class="ampstart-image-fullpage-hero m0 relative">
			<div class="bg-cover vw vh hero-cover"></div>
			<figcaption class="absolute top-0 right-0 left-0">
				<?php include('post-meta.php') ?>
			</figcaption>
		</figure>
	</body>
</html>

