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

	<footer id="colophon" class="site-footer clearfix" role="contentinfo">
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
				'menu_class'		=> 'menu site-map cf',
				'menu_id'			=> 'main-nav-bottom',
				'fallback_cb'		=> false,
			) ); ?>
			<div class="island outer media media-links-wrapper">
				<?php
				$footer_logo_href = $theme_options['footer_logo_href'] ?: '#';
				$footer_logo = $theme_options['footer_logo'];
				$footer_logo_retina = $theme_options['footer_logo_retina'];

				if(!empty($footer_logo)) { ?>
					<a class="media__img" href="<?php echo $footer_logo_href; ?>">
						<img src="<?php echo $footer_logo; ?>" <? if($footer_logo_retina) { echo 'data-retina="'.$footer_logo_retina.'"'; } ?> />
					</a><?php
				}?>
			</div><!-- .site-media-links -->

			<nav class="navbar navbar-inverse" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="glyphicon glyphicon-th-list"></span>
						</button>
						<a class="navbar-brand" href="#"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
					</div>

					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<?php 	wp_nav_menu( array(
							'theme_location'	=> 'footer',
							'menu_class'		=> 'menu-footer nav navbar-nav',
							'fallback_cb'		=> false,
						) ); ?>
					</div>
				</div>
			</nav>

			<div class="container">
				<?php wp_nav_menu( array(
					'theme_location'	=> 'subfooter',
					'container_class'	=> 'menu-admin-links-container text-right',
					'menu_class'		=> 'list-inline menu-sub-footer',
					'fallback_cb'		=> false
				) ); ?>
			</div>
			<div class="site-credits micro">
				<?php echo $theme_options['credits']; ?>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon .site-footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
