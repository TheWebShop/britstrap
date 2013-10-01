<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package britstrap
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<nav role="navigation" class="site-navigation navbar navbar-default alternate-navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex3-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="glyphicon glyphicon-th-list"></span>
					</button>
					<a class="navbar-brand" href="#"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
				</div>

				<div class="collapse navbar-collapse navbar-ex3-collapse">
					<?php wp_nav_menu( array(
					'theme_location'	=> 'primary',
					'menu_class'		=> 'menu-bottom-navigation nav navbar-nav main-nav',
					'menu_id'			=> 'menu-bottom-navigation',
					'depth'				=> 1,
					'fallback_cb'		=> false
					) ); ?>
				</div>
			</div><!-- .container -->
		</nav><!-- .site-navigation .main-navigation -->

		<div class="container">
			<?php wp_nav_menu( array(
				'theme_location'	=> 'sitemap',
				'menu_class'		=> 'menu site-map clearfix',
				'menu_id'			=> 'main-nav-bottom',
				'fallback_cb'		=> false,
			) ); ?>

			<nav class="media-links" role="navigation">
				<div class="media-links-header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri(); ?>/images/bc-logo-small.gif" width="180px" height="48px" style="padding-right: 10px;">
						<span class="sr-only"><?php bloginfo( 'name' ); ?></span>
					</a>
				</div>

				<div class="media-links-wrapper">
					<?php 	wp_nav_menu( array(
						'theme_location'	=> 'footer',
						'menu_class'		=> 'menu-media-links list-inline',
						'fallback_cb'		=> false,
					) ); ?>
				</div>
			</nav>

			<?php wp_nav_menu( array(
				'theme_location'	=> 'subfooter',
				'container_class'	=> 'menu-admin-links-container text-right',
				'menu_class'		=> 'list-inline menu-sub-footer',
				'fallback_cb'		=> false
			) ); ?>
			<div class="site-credits micro">
				<?php echo $theme_options['credits']; ?>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon .site-footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
