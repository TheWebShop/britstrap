<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package britstrap
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	<script src="http://localhost:35739/livereload.js"></script>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<?php do_action( 'before' ); ?>
		<header id="masthead" class="site-header" role="banner">

			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'britstrap' ); ?>"><?php _e( 'Skip to content', 'britstrap' ); ?></a></div>

			<nav class="top-navigation navbar navbar-default clearfix" role="navigation">

				<div class="container">
					<?php wp_nav_menu( array(
							'theme_location'  => 'top',
							'menu_class'      => 'menu-top-navigation nav navbar-nav',
							// No menu available: no output.
							'fallback_cb'    => '__return_false'
						) ); ?>
					<div class="more-government-link text-center"><a href="http://www.gov.bc.ca/">Find more on gov.bc.ca »</a></div>
				</div>
			</nav>

			<div class="site-branding">
				<div class="container">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php echo get_template_directory_uri() ?>/images/bc_logo_hor.png" width="214px" height="70px" style="padding-right: 10px;">
							<?php bloginfo( 'name' ); ?>
						</a>
					</h1>

					<div class="site-services text-center">
						<a href="http://www2.gov.bc.ca/en/services_finder/finder.page"><span class="glyphicon glyphicon-cog"></span> Services &amp; Forms</a>
						<a href="https://extranet.gov.bc.ca/forms/gov/contact/index.html"><span class="glyphicon glyphicon-envelope"></span> Contact Government</a>
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>

			<nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<?php wp_nav_menu( array(
							'theme_location'  => 'primary',
							'menu_class'      => 'nav navbar-nav'
						) ); ?>
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
			<div class="main-navigation-placeholder"></div>

		</header><!-- #masthead -->

		<div id="content" class="site-content">
